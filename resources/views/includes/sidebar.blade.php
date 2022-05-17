<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                General
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('home'))
                }}" href="{{ route('home') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{
        active_class(Route::is('auth/representativ'))
    }}" href="{{ route('admin.auth.representativ.index') }}">
                    Sales Representatives Management
                </a>
            </li>
        </ul>    
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
