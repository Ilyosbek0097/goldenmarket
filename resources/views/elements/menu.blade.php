<!-- Dashboard -->
@if(auth()->user()->role == 'admin')
    <li class="menu-item {{ request()->is('admin/admin_dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.admin_dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Bosh Sahifa</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/branchs') ? 'active' : '' }}">
        <a href="{{ route('branchs.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-bank"></i>
            <div data-i18n="Analytics">Filiallar</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/types') ? 'active' : '' }}">
        <a href="{{ route('types.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="Analytics">Maxsulot Turi</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/brands') ? 'active' : '' }}">
        <a href="{{ route('brands.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Analytics">Maxsulot Brendi</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/marks') ? 'active' : '' }}">
        <a href="{{ route('marks.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxl-markdown"></i>
            <div data-i18n="Analytics">Natsenka</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/currencys') ? 'active' : '' }}">
        <a href="{{ route('currencys.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-money"></i>
            <div data-i18n="Analytics">Kurs</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/productnames') ? 'active' : '' }}">
        <a href="{{ route('productnames.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Analytics">Maxsulot To'liq Nomi</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/addproducts') ? 'active' : '' }}">
        <a href="{{ route('addproducts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-cart-add"></i>
            <div data-i18n="Analytics">Maxsulot Qo'shish</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/suppliers') ? 'active' : '' }}">
        <a href="{{ route('suppliers.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Analytics">Contragentlar</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/users') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-group"></i>
            <div data-i18n="Analytics">Sotuvchilar</div>
        </a>
    </li>
{{--    <li class="menu-item {{ request()->is('admin/teachers') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('teachers.index') }}" class="menu-link">--}}
{{--            <i class="menu-icon tf-icons bx bxs-group"></i>--}}
{{--            <div data-i18n="Analytics">O'qituvchilar</div>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="menu-item {{ request()->is('admin/students') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('students.index') }}" class="menu-link">--}}
{{--            <i class="menu-icon tf-icons bx bxs-user-circle"></i>--}}
{{--            <div data-i18n="Analytics">O'quvchilar</div>--}}
{{--        </a>--}}
{{--    </li>--}}
    <!-- Layouts -->

@elseif(auth()->user()->role == 'superuser')

@else
    <li class="menu-item {{ request()->is('user/warehouses') ? 'active' : '' }}">
        <a href="{{ route('warehouses.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-plus-circle"></i>
            <div data-i18n="Analytics">Maxsulot Qo'shish</div>
        </a>
    </li>
@endif


