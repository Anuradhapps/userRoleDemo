@php
    $permissionedRoles = Auth::user()->role->permissionedRoles;
    $permissionNames = [];
    foreach ($permissionedRoles as $permissionedRole) {
        $permissionNames[] = $permissionedRole->permission->name;
    }
@endphp

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (in_array('dashboard', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif

        @if (in_array('user', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'user') collapsed @endif" href="{{ url('/panel/user') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li>
        @endif

        @if (in_array('role', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'role') collapsed @endif" href="{{ url('/panel/role') }}">
                    <i class="bi bi-person"></i>
                    <span>Roles</span>
                </a>
            </li>
        @endif

        @if (in_array('category', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'category') collapsed @endif"
                    href="{{ url('/panel/category') }}">
                    <i class="bi bi-person"></i>
                    <span>Category</span>
                </a>
            </li>
        @endif

        @if (in_array('sub category', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'sub_category') collapsed @endif"
                    href="{{ url('/panel/sub_category') }}">
                    <i class="bi bi-person"></i>
                    <span>Sub Category</span>
                </a>
            </li>
        @endif

        @if (in_array('product', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'product') collapsed @endif"
                    href="{{ url('/panel/product') }}">
                    <i class="bi bi-person"></i>
                    <span>Product</span>
                </a>
            </li>
        @endif

        @if (in_array('settings', $permissionNames))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'settings') collapsed @endif"
                    href="{{ url('/panel/settings') }}">
                    <i class="bi bi-star"></i>
                    <span>Settings</span>
                </a>
            </li>
        @endif

    </ul>
</aside>
