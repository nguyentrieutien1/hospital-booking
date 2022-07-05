<div>
    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{ asset('admin/images/faces/face28.jpg') }}" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
            </a>
            <a href="{{ url("logout") }}" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
            </a>
        </div>
    </li>
</div>
