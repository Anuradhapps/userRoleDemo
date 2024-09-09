<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'user') collapsed @endif" href="{{ url('/panel/user') }}">
                <i class="bi bi-person"></i>
                <span>User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'role') collapsed @endif" href="{{ url('/panel/role') }}">
                <i class="bi bi-person"></i>
                <span>Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'category') collapsed @endif" href="{{ url('/panel/category') }}">
                <i class="bi bi-person"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'sub_category') collapsed @endif" href="{{ url('/panel/sub_category') }}">
                <i class="bi bi-person"></i>
                <span>Sub Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'product') collapsed @endif" href="{{ url('/panel/product') }}">
                <i class="bi bi-person"></i>
                <span>Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'settings') collapsed @endif" href="{{ url('/panel/settings') }}">
                <i class="bi bi-star"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>
