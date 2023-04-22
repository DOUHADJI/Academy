@aware(['title'])

<li class="nav-item has-treeview ">
    <a href="{{ route($route) }}" class="nav-link @if($title === $routeTitle)
        active @endif" >
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $navTitle }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

</li>