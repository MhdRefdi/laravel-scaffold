<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Menu</span>
</li>

<!-- Dashboard -->
<li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboard">Dashboard</div>
    </a>
</li>

<!-- Master Data -->
<li class="menu-item {{ Request::is('master-data/*') ? 'open active' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Master Data">Master Data</div>
    </a>

    <ul class="menu-sub">
        {{-- <li class="menu-item {{ Request::is('master-data/client*') ? 'active' : '' }}">
            <a href="{{ route('backend.client.index') }}" class="menu-link">
                <div data-i18n="Invoice Client">Invoice Client</div>
            </a>
        </li> --}}
    </ul>
</li>
