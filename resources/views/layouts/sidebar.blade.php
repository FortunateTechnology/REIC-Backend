<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('images/logo-mini.jpg') }}" height="150" alt="REIC"
            class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-light">{{ config('app.name') }} {{ config('app.subtitle') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
