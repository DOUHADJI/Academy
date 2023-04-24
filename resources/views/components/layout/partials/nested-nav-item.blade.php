<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link">
        <i class="fa fa-circle  @if(Route::currentRouteName() == $route) text-green-400 @endif nav-icon"></i>
        <p>{{ $navTitle }}</p>
    </a>
</li>
