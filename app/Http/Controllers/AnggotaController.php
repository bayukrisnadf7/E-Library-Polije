<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilanTambahAnggota()
    {
        return view('main.tambah-anggota');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'nama' => 'required|string',
            'nim' => 'nullable|string',
            'institute' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'jenis_anggota' => 'required|integer',
            'alamat_anggota' => 'nullable|string',
            'catatan' => 'nullable|string',
            'password' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // << ini sudah betul
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('user'), $filename); // pindah ke public/user
            $data['foto'] = 'user/' . $filename;
        }

        $data['password'] = Hash::make($data['password']);

        User::create($data); // <<< pakai model Anggota

        return redirect()->route('main.index-anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('main.edit-anggota', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'nama' => 'required|string',
            'nim' => 'nullable|string',
            'institute' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'jenis_anggota' => 'required|integer',
            'alamat_anggota' => 'nullable|string',
            'catatan' => 'nullable|string',
            'password' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && file_exists(public_path($user->foto))) {
                unlink(public_path($user->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('user'), $filename);
            $data['foto'] = 'user/' . $filename;
        }

        // Handle password jika diubah
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Jangan ubah password kalau tidak diisi
        }

        $user->update($data);

        return redirect()->route('main.index-anggota')->with('success', 'Anggota berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto && file_exists(public_path($user->foto))) {
            unlink(public_path($user->foto));
        }

        $user->delete();

        return redirect()->route('main.index-anggota')->with('success', 'Anggota berhasil dihapus.');
    }
    public function exportAnggota()
    {
        $anggota = User::all();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=anggota.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $columns = ['user_id', 'email', 'nama', 'nim', 'foto', 'institute', 'no_telepon', 'jenis_anggota', 'alamat_anggota', 'catatan', 'password', 'remember_token', 'created_at', 'updated_at'];

        $callback = function () use ($anggota, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($anggota as $user) {
                fputcsv($file, [
                    $user->user_id,
                    $user->email,
                    $user->nama,
                    $user->nim,
                    $user->foto,
                    $user->institute,
                    $user->no_telepon,
                    $user->jenis_anggota,
                    $user->alamat_anggota,
                    $user->catatan,
                    $user->password,
                    $user->remember_token,
                    $user->created_at,
                    $user->updated_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function hapusAnggotaMassal(Request $request)
    {
        $ids = explode(',', $request->ids);

        foreach ($ids as $id) {
            $user = User::where('user_id', $id)->first();
            if ($user) {
                // Hapus foto jika ada
                if ($user->foto && file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }
                $user->delete();
            }
        }

        return redirect()->route('main.index-anggota')->with('success', 'Beberapa anggota berhasil dihapus.');
    }


}
