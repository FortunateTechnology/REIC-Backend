<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">

    <a href="{{ route('member.index') }}" class="nav-link {{ Request::is('member.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Member</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('package.index') }}" class="nav-link {{ Request::is('package.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Package</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Users</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>Roles</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('faq.index') }}" class="nav-link {{ Request::is('faq.index') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-question"></i>
        <p>FAQ</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('popup.index') }}" class="nav-link {{ Request::is('popup.index') ? 'active' : '' }}">
        <i class="nav-icon fa-regular fa-window-maximize"></i>
        <p>POPUP</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('reportmemberstatus.index') }}" class="nav-link {{ Request::is('reportmemberstatus.index') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-print"></i>
        <p>รายงานสถานะสมาชิก</p>
    </a>

</li>
<li class="nav-item">

    <a href="{{ route('reporttoppackage.index') }}" class="nav-link {{ Request::is('reporttoppackage.index') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-print"></i>
        <p>รายงานสถิติการเลือกใช้ Package</p>
    </a>

</li>