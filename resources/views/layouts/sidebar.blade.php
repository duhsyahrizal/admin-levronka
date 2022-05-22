<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link text-center" style="margin: auto !important;">
            <img src="/assets/logo/logo.png" width="48" alt="" class="logo">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->path() == '/' ? 'active' : null }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage</span>
        </li>
        <li class="menu-item {{ request()->path() == 'category' ? 'active' : null }}">
            <a href="/category" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Category">Category</div>
            </a>
        </li>
        <li class="menu-item {{ request()->path() == 'product' ? 'active' : null }}">
            <a href="/product" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Product">Product</div>
            </a>
        </li>
    </ul>
</aside>
