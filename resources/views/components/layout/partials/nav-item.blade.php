<li class="nav-item has-treeview ">
    <a href="{{ route($route) }}" class="nav-link @if(Route::currentRouteName() == $route)
        active @endif" >
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

</li>