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
