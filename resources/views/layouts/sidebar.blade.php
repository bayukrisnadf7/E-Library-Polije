<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="/admin/main/index" class="text-nowrap logo-img">
        <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
        <img src="{{ URL::asset('build/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
    </a>
    <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
    </a>
</div>

<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard"
                aria-expanded="false">
                <span>
                    <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/bibliography') ? 'active' : '' }}" href="/admin/bibliography"
                aria-expanded="false">
                <span>
                    <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Data Buku</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/peminjaman') ? 'active' : '' }}" href="/admin/peminjaman"
                aria-expanded="false">
                <span>
                    <i class="ti ti-exchange"></i>
                </span>
                <span class="hide-menu">Data Peminjaman</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/anggota') ? 'active' : '' }}" href="/admin/anggota"
                aria-expanded="false">
                <span>
                    <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Anggota</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/koleksi') ? 'active' : '' }}" href="/admin/koleksi"
                aria-expanded="false">
                <span>
                    <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Koleksi</span>
            </a>
        </li>
    </ul>
</nav>

<div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
    <div class="hstack gap-3">
        <div class="john-img">
            <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="40"
                height="40" alt="modernize-img" />
        </div>
        @auth
            <div class="john-title">
                <h6 class="mb-0 fs-4 fw-semibold">{{ explode(' ', auth()->user()->nama)[0] }}</h6>
                @php
                    $jenis = auth()->user()->jenis_anggota;
                    $label = 'Tidak Diketahui';

                    if ($jenis == 1) {
                        $label = 'Mahasiswa';
                    } elseif ($jenis == 2) {
                        $label = 'Dosen';
                    } elseif ($jenis == 3) {
                        $label = 'Karyawan';
                    } elseif ($jenis == 4) {
                        $label = 'Teknisi';
                    } elseif ($jenis == 5) {
                        $label = 'Admin';
                    } elseif ($jenis == 6) {
                        $label = 'Pekerja';
                    }
                @endphp

                <span class="fs-2">{{ $label }}</span>


            </div>
        @endauth
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="button" class="border-0 bg-transparent text-primary ms-auto" aria-label="logout"
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout" onclick="confirmLogout()">
                <i class="ti ti-power fs-6"></i>
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi Anda akan berakhir.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    }
</script>

