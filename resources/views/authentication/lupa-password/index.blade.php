@extends('main')

@section('content')
    <div class="w-full md:h-screen max-h-screen relative overflow-hidden">
        <!-- Background Gambar -->
        <img src="img/login.png" alt="" class="md:absolute lg:block md:block hidden lg:w-auto md:w-[50%] md:h-[100%]">
        <div class="absolute top-3 left-5 flex gap-3 items-center">
            <img src="img/logopol.png" alt="Logo" class="md:w-14 w-10">
            <div class="flex flex-col  text-black font-bold md:text-sm text-xs">
                <p>UPA PERPUSTAKAAN</p>
                <div class="flex md:gap-[19px] gap-[17px]">
                    <p>P</p>
                    <p>O</p>
                    <p>L</p>
                    <p>I</p>
                    <p>J</p>
                    <p>E</p>
                </div>
            </div>
        </div>
        <!-- Konten di Atas Gambar -->
        <div class="relative flex h-screen justify-between items-center lg:mx-40 md:mx-28 mx-10">
            <img src="img/login-1.png" alt="" class="lg:block md:block hidden lg:w-[400px] md:w-[270px]">
            <div class=" flex flex-col gap-5 w-[400px]">
                <img src="img/logopol 1.png" alt="" width="100" class="mx-auto">
                <p class="text-center font-bold">Reset Password</p>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-3 w-full">
                        <div class="flex flex-col gap-2">
                            <p>Email</p>
                            <div class="flex gap-2 items-center">
                                <input type="email" name="email"
                                    class="bg-[#E1E1E1] py-3 rounded-lg px-3 w-full placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                                    placeholder="Email">
                                <button type="submit"
                                    class="bg-[#3694A8] border-none py-2 p-1 w-[130px] rounded-lg text-white font-semibold mt-1 ">Kirim
                                    Kode</button>
                            </div>
                        </div>
                        {{-- <button type="submit" class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-1">Verifikasi</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (session('resetSuccess'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('resetSuccess') }}',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            });
        </script>
    @endif

    @if (session('resetError'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('resetError') }}',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            });
        </script>
    @endif
@endsection

