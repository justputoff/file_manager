        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="{{ route('dashboard') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img src="{{ asset('assets/img/logo-intents.jpg') }}" style="max-width: 150px" alt="">
                </span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1 mt-3">
              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-home"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <!-- Files -->
              <li class="menu-item {{ Route::is('files*') ? 'active' : '' }}">
                <a href="{{ route('files.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Analytics">Image</div>
                </a>
              </li>
              <!-- Documents -->
              <li class="menu-item {{ Route::is('documents*') ? 'active' : '' }}">
                <a href="{{ route('documents.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Analytics">Document</div>
                </a>
              </li>
            </ul>
          </aside>
          <!-- / Menu -->