@extends('main')

@section('content')
    {{-- Toast Notifikasi (jika session success ada) --}}
    @if (session('success'))
        <div class="toast align-items-center text-bg-primary border-0 show position-fixed bottom-0 end-0 m-4 z-50"
            role="alert" aria-live="assertive" aria-atomic="true" id="registerToast">
            <div class="toast-body hstack align-items-start gap-3">
                <i class="ti ti-alert-circle fs-4"></i>
                <div>
                    <h5 class="text-white fs-6 mb-1">Registrasi Berhasil</h5>
                    <h6 class="text-white fs-5 mb-0">Silahkan login</h6>
                </div>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="w-full h-screen relative overflow-hidden">
        <!-- Background Gambar -->
        <img src="img/login.png" alt="" class="md:absolute lg:block md:block hidden lg:w-auto md:w-[50%] md:h-[100%]">

        <div class="absolute top-3 left-5 flex gap-3 items-center">
            <img src="img/logopol 1.png" alt="Logo" class="md:w-14 w-10">
            <div class="flex flex-col text-black font-bold md:text-sm text-xs">
                <p>UPA PERPUSTAKAAN</p>
                <div class="flex md:gap-[19px] gap-[17px]">
                    <p>P</p><p>O</p><p>L</p><p>I</p><p>J</p><p>E</p>
                </div>
            </div>
        </div>

        <!-- Form Registrasi -->
        <div class="relative flex h-screen justify-between items-center lg:mx-40 md:mx-28 mx-10">
            <img src="img/login-1.png" alt="" class="lg:block md:block hidden lg:w-[400px] md:w-[270px]">
            <div class="flex flex-col gap-5 w-[400px]">
                <img src="img/logopol 1.png" alt="" width="100" class="mx-auto">
                <p class="text-center font-bold">Registrasi Akun</p>
                <div class="flex flex-col gap-3 w-full max-w-md mx-auto mt-2">
                    <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-3">
                        @csrf

                        <div class="flex flex-col gap-1">
                            <label for="id_user">ID User (NIM / NIDN)</label>
                            <input type="text" name="id_user" id="id_user" value="{{ old('id_user') }}" required
                                class="bg-[#E1E1E1] py-2 border-none rounded-lg px-3 placeholder:text-[#A8A8A8]"
                                placeholder="ID User">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="bg-[#E1E1E1] py-2 border-none rounded-lg px-3 placeholder:text-[#A8A8A8]"
                                placeholder="Email">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                                class="bg-[#E1E1E1] py-2 border-none rounded-lg px-3 placeholder:text-[#A8A8A8]"
                                placeholder="Nama Lengkap">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="password">Password</label>
                            <input type="password" name="password" required
                                class="bg-[#E1E1E1] py-2 border-none rounded-lg px-3 placeholder:text-[#A8A8A8]"
                                placeholder="Password">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="password_confirmation">Ulangi Password</label>
                            <input type="password" name="password_confirmation" required
                                class="bg-[#E1E1E1] py-2 border-none rounded-lg px-3 placeholder:text-[#A8A8A8]"
                                placeholder="Ulangi Password">
                        </div>

                        <button type="submit"
                            class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-2">Daftar</button>
                    </form>

                    <div class="flex flex-col gap-2">
                        <p class="text-center">Sudah Punya Akun? <a href="/login"
                                class="text-[#334B48] hover:text-[#3694A8]">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toastEl = document.getElementById('registerToast');
                if (toastEl) {
                    new bootstrap.Toast(toastEl).show();
                }
            });
        </script>
    @endif
@endsection
