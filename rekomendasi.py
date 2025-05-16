from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.neighbors import NearestNeighbors
from fastapi.responses import JSONResponse
from fastapi import FastAPI, Query
from dotenv import load_dotenv
from typing import Optional
import mysql.connector
import pandas as pd
import difflib
import json
import re
import os

app = FastAPI()

#======================= LOAD DATABASE =======================
print("Loading Database")
load_dotenv()

db_host = os.environ.get("DB_HOST", "localhost")
db_user = os.environ.get("DB_USERNAME", "root")
db_password = os.environ.get("DB_PASSWORD", "Elibrary2025!")
db_database = os.environ.get("DB_DATABASE", "elibrary")

def load_books_from_db():
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    query = "SELECT * FROM buku"
    df = pd.read_sql(query, conn)
    conn.close()
    return df

def load_peminjaman_from_db():
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    query = "SELECT * FROM peminjaman"
    df = pd.read_sql(query, conn)
    conn.close()
    return df

def load_exemplar_from_db():
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    query = "SELECT * FROM exemplar"
    df = pd.read_sql(query, conn)
    conn.close()
    return df

def get_id_buku_from_eksemplar(eksemplar):
    query = f"SELECT id_buku FROM exemplar WHERE kode_eksemplar = '{eksemplar}'"
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    cursor = conn.cursor()
    cursor.execute(query)
    result = cursor.fetchone()
    conn.close()
    if result:
         return result[0]
    else:
        return None

def get_judul_buku(id_buku):
    query = f"SELECT judul_buku FROM buku WHERE id_buku = '{id_buku}'"
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    cursor = conn.cursor()
    cursor.execute(query)
    result = cursor.fetchone()
    conn.close()
    if result:
         return result[0]
    else:
        return None

def get_buku_from_keyword(keyword):
    query = f"SELECT id_buku, judul_buku FROM buku WHERE judul_buku like '%{keyword}%'"
    conn = mysql.connector.connect(
        host=db_host,
        user=db_user,
        password=db_password,
        database=db_database
    )
    df = pd.read_sql(query, conn)
    conn.close()
    return df

keyword_file_path = "keyword_jurusan.csv"
df_keyword = pd.read_csv(keyword_file_path, encoding='utf-8')
# dataset buku
df = load_books_from_db()
# Load dataset peminjaman
df_peminjaman = load_peminjaman_from_db()

#======================= TF-IDF BUKU =======================
print("Processing TF-IDF Buku")
# Preprocess text
def preprocess_text(text):
    if pd.isna(text):
        return ""
    return text.lower()

# Gabungkan kolom yang relevan
df['combined_features'] = df[['judul_buku', 'pengarang', 'penerbit', 'abstrak', 'subyek']].fillna('').agg(' '.join, axis=1)
df['combined_features'] = df['combined_features'].apply(preprocess_text)

# Vectorization pake TF-IDF
vectorizer = TfidfVectorizer(stop_words='english')
tfidf_matrix = vectorizer.fit_transform(df['combined_features'])

# Hitung cosine similarity
cosine_sim = cosine_similarity(tfidf_matrix, tfidf_matrix)

# Fungsi rekomendasi
def get_book_recommendations(title, df, cosine_sim, num_recommendations=5):
    idx = df[df['judul_buku'].str.lower() == title.lower()].index
    if len(idx) == 0:
        return "Buku tidak ditemukan."
    idx = idx[0]

    # Ambil skor similarity untuk buku yang diberikan
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)[1:num_recommendations+1]

    book_indices = [i[0] for i in sim_scores]
    scores = [i[1] for i in sim_scores]

    recommendations = df.iloc[book_indices][['judul_buku', 'pengarang', 'subyek']].copy()
    recommendations['similarity'] = [round(score * 100, 2) for score in scores]

    return recommendations

def get_book_recommendations_index(idx, df, cosine_sim, num_recommendations=5):
    # Ambil skor similarity untuk buku yang diberikan
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)[1:num_recommendations+1]

    book_indices = [i[0] for i in sim_scores]
    scores = [i[1] for i in sim_scores]

    recommendations = df.iloc[book_indices][['judul_buku', 'pengarang', 'subyek']].copy()
    recommendations['similarity'] = [round(score * 100, 2) for score in scores]

    return recommendations


#======================= KNN PEMINJAMAN =======================
print("Processing KNN Peminjaman")

# Hapus data kosong dan reset index
df_peminjaman = df_peminjaman.dropna(subset=['kode_eksemplar']).reset_index(drop=True)

df_exemplar = load_exemplar_from_db()
df_exemplar['id_buku'] = df_exemplar['id_buku'].astype(str)
# Buat dictionary mapping dari kode_eksemplar ke id_buku
mapping = df_exemplar.set_index('kode_eksemplar')['id_buku'].to_dict()
# Update kolom id_buku di df_peminjaman
df_peminjaman['id_buku'] = df_peminjaman['kode_eksemplar'].map(mapping)

# Buat tabel pivot user-item
user_item_matrix = df_peminjaman.pivot_table(index='user_id', columns='id_buku', aggfunc='size', fill_value=0)

# Inisialisasi model KNN
knn = NearestNeighbors(metric='cosine', algorithm='brute')
knn.fit(user_item_matrix.values)

# Fungsi rekomendasi berdasarkan KNN User-Based Collaborative Filtering
def recommend_books_for_user_knn(user_id, user_item_matrix, knn_model, n_neighbors=10, n_recommendations=5):
    if user_id not in user_item_matrix.index:
        return "User tidak ditemukan."

    # Ambil index user
    user_index = user_item_matrix.index.get_loc(user_id)

    # Cari tetangga terdekat
    distances, indices = knn_model.kneighbors([user_item_matrix.iloc[user_index].values], n_neighbors=n_neighbors+1)
    similar_users = [user_item_matrix.index[i] for i in indices.flatten() if i != user_index]

    # Kumpulkan buku dari user tetangga yang belum dipinjam user target
    recommendations = []
    for sim_user in similar_users:
        sim_user_books = user_item_matrix.loc[sim_user]
        user_books = user_item_matrix.loc[user_id]
        unseen_books = sim_user_books[(sim_user_books > 0) & (user_books == 0)].index.tolist()
        recommendations.extend(unseen_books)

    # Hitung buku paling direkomendasikan
    recommended_books = pd.Series(recommendations).value_counts().head(n_recommendations)

    return recommended_books if not recommended_books.empty else "Tidak ada rekomendasi baru."

def find_closest_user_id(user_id, user_list):
    # Pisahkan prefix dan angka dari user_id input
    match = re.match(r"([A-Za-z]+)(\d+)", user_id)
    if not match:
        closest_matches = difflib.get_close_matches(user_id, user_list, n=1, cutoff=0.6)
        return closest_matches[0] if closest_matches else None
    prefix, num_part = match.groups()

    # Filter user_list yang punya prefix sama
    filtered = [uid for uid in user_list if uid.startswith(prefix)]

    # Ambil hanya bagian angka dari user ID
    filtered_numbers = [re.match(rf"{prefix}(\d+)", uid).group(1) for uid in filtered]

    # Cari angka terdekat, ambil yang pertama
    closest = difflib.get_close_matches(num_part, filtered_numbers, n=1, cutoff=0.6)
    if closest:
        return f"{prefix}{closest[0]}"
    else:
        closest_matches = difflib.get_close_matches(user_id, user_list, n=1, cutoff=0.6)
        return closest_matches[0] if closest_matches else None

# rekomendasi dari id user jurusan
def rekomendasi_topik(user_id, jumlah=None):
    # --- Cek dan ekstrak prefix ---
    match = re.match(r"([A-Za-z]+)(\d+)", user_id)
    if not match:
        return pd.DataFrame()

    prefix, num_part = match.groups()

    # --- Cari keyword berdasarkan prefix ---
    result = df_keyword[df_keyword['Kode'] == prefix]
    if result.empty:
        return pd.DataFrame()

    # --- Bersihkan keyword ---
    raw_keyword = result.iloc[0]['Keyword']
    cleaned_keyword = raw_keyword.replace('[', '').replace(']', '').replace("'", '').replace('"', '')
    keyword_list = [kw.strip() for kw in cleaned_keyword.split(",") if kw.strip() != ""]

    # --- Loop ambil buku ---
    df_result_buku = pd.DataFrame()

    for word in keyword_list:
        df_result = get_buku_from_keyword(word)
        df_result_buku = pd.concat([df_result_buku, df_result], ignore_index=True)

    # --- Drop duplikat dan acak urutan ---
    df_result_buku = df_result_buku.drop_duplicates(subset='id_buku', keep='first')
    df_result_buku = df_result_buku.sample(frac=1).reset_index(drop=True)

    # --- Jika jumlah diminta, ambil N teratas ---
    if jumlah is not None:
        df_result_buku = df_result_buku.head(jumlah)
        return df_result_buku
    else:
        return df_result_buku
#======================= API ENDPOINT =======================
print("Starting API SERVER")
@app.get("/rekomendasi/user/{user_id}")
def rekomendasi_user(user_id: str, jumlah: Optional[int] = 5):
    try:
        recommended_books_knn = recommend_books_for_user_knn(user_id, user_item_matrix, knn, n_recommendations=jumlah)
        print("Coba KNN")
        if isinstance(recommended_books_knn, pd.Series) and not recommended_books_knn.empty:
            print(f"Request [OK] user_id:{user_id} jumlah:{jumlah} result:{len(recommended_books_knn.index)}")
            buku_list = [
                {"id_buku": str(buku), "judul_buku": get_judul_buku(str(buku))}
                for buku in recommended_books_knn.index.tolist()
            ]
            return {
                "status": 200,
                "message": "ok",
                "buku": buku_list
            }
        else:
            print("Coba Topik")
            rekomendasi_topik_result = rekomendasi_topik(user_id, jumlah)
            print(type(rekomendasi_topik_result))
            if len(rekomendasi_topik_result) >= jumlah:
                buku_list = []
                for index, row in rekomendasi_topik_result.iterrows():
                    buku_list.append({
                        "id_buku": row['id_buku'],
                        "judul_buku": row['judul_buku'],
                    })
                return {
                    "status": 200,
                    "message": "Rekomendasi By Topik",
                    "buku": buku_list
                }
            else:
                print("Coba ID")
                # Cari user ID mirip
                closest_user = find_closest_user_id(user_id, user_item_matrix.index.tolist())
                if closest_user:
                    # Coba rekomendasi ulang dengan user mirip
                    recommended_books_knn = recommend_books_for_user_knn(closest_user, user_item_matrix, knn, n_recommendations=jumlah)
                    if isinstance(recommended_books_knn, pd.Series) and not recommended_books_knn.empty:
                        buku_list = [
                            {"id_buku": str(buku), "judul_buku": get_judul_buku(str(buku))}
                            for buku in recommended_books_knn.index.tolist()
                        ]
                        return {
                            "status": 200,  # Partial content (karena pakai ID mirip)
                            "message": f"User ID {user_id} tidak ditemukan, menampilkan hasil dari user mirip: {closest_user}",
                            "buku": buku_list
                        }
                else:
                    return JSONResponse(
                        status_code=404,
                        content={
                            "status": 404,
                            "message": f"User ID {user_id} tidak ditemukan atau tidak punya cukup data.",
                            "buku": []
                        }
                    )
    except Exception as e:
        print(f"Request [ERROR] user_id:{user_id} jumlah:{jumlah} error:{str(e)}")
        return JSONResponse(
            status_code=500,
            content={
                "status": 500,
                "message": f"Terjadi kesalahan internal: {str(e)}",
                "buku": []
            }
        )

@app.get("/rekomendasi/buku/{id_buku}")
def rekomendasi_buku(id_buku: int, jumlah: Optional[int] = 5):

    try:
        similar_books = get_book_recommendations_index(id_buku, df, cosine_sim, num_recommendations=jumlah)

        if isinstance(similar_books, pd.DataFrame) and not similar_books.empty:
            print(f"Request [OK] id_buku:{id_buku} jumlah:{jumlah} result:{len(similar_books)}")
            buku_list = []
            for index, row in similar_books.iterrows():
                buku_list.append({
                    "id_buku": str(index),
                    "judul_buku": row['judul_buku'],
                    "similarity": round(float(row['similarity']), 2)
                })
            return {
                "status": 200,
                "message": "ok",
                "buku": buku_list
            }
        else:
            print(f"Request [FAIL] id_buku:{id_buku} jumlah:{jumlah} result:{len(similar_books)}")
            return {
                "status": 404,
                "message": "tidak ada rekomendasi",
                "buku": []
            }
    except IndexError:
        return JSONResponse(
            status_code=404,
            content={
                "status": 404,
                "message": f"Buku dengan index {id_buku} tidak ditemukan.",
                "buku": []
            }
        )

    except Exception as e:
        return JSONResponse(
            status_code=500,
            content={
                "status": 500,
                "message": f"Terjadi kesalahan internal: {str(e)}",
                "buku": []
            }
        )