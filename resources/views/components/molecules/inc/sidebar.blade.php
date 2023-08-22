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

<!-- Buat Invoice -->
{{-- <li class="menu-item {{ request()->is('master-data/invoice/create*') ? 'active' : '' }}">
    <a href="{{ route('backend.invoice.create') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div data-i18n="Buat Invoice">Buat Invoice</div>
    </a>
</li> --}}

<!-- Master Data -->
<li class="menu-item {{ Request::is('master-data/*') ? 'open active' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Master Data">Master Data</div>
    </a>

    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('master-data/client*') ? 'active' : '' }}">
            <a href="{{ route('backend.client.index') }}" class="menu-link">
                <div data-i18n="Invoice Client">Invoice Client</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('master-data/payment*') ? 'active' : '' }}">
            <a href="{{ route('backend.payment.index') }}" class="menu-link">
                <div data-i18n="Pembayaran">Pembayaran</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('master-data/invoice*') ? 'active' : '' }}">
            <a href="{{ route('backend.invoice.index') }}" class="menu-link">
                <div data-i18n="Invoice">Invoice</div>
            </a>
        </li>
    </ul>
</li>
