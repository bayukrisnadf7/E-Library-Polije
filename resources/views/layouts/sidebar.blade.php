
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
          <a class="sidebar-link {{ request()->is('/admin/main/index') ? 'active' : '' }}" href="/admin/main/index" aria-expanded="false">
            <span>
              <i class="ti ti-home"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/admin/main/index-buku') ? 'active' : '' }}" href="/admin/main/index-buku" aria-expanded="false">
            <span>
              <i class="ti ti-book"></i>
            </span>
            <span class="hide-menu">Data Buku</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/admin/main/index-eksemplar') ? 'active' : '' }}" href="/admin/main/index-eksemplar" aria-expanded="false">
            <span>
              <i class="ti ti-books"></i>
            </span>
            <span class="hide-menu">Data Eksemplar</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/admin/main/index-peminjaman') ? 'active' : '' }}" href="/admin/main/index-peminjaman" aria-expanded="false">
            <span>
              <i class="ti ti-exchange"></i>
            </span>
            <span class="hide-menu">Data Peminjaman</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/admin/main/index-anggota') ? 'active' : '' }}" href="/admin/main/index-anggota" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Data Artikel</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/admin/main/index-anggota') ? 'active' : '' }}" href="/admin/main/index-anggota" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Data Berita</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
      <div class="hstack gap-3">
        <div class="john-img">
          <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="modernize-img" />
        </div>
        <div class="john-title">
          <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
          <span class="fs-2">Designer</span>
        </div>
        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
          <i class="ti ti-power fs-6"></i>
        </button>
      </div>
    </div>