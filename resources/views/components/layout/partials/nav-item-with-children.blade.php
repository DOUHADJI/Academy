@aware(["title"])

<li class="nav-item has-treeview @if($title == $pageTitle) menu-open @endif ">
    <a href="#" class="nav-link @if($title == $pageTitle) active @endif">
        <i class="nav-icon {{$icon}}"></i>
        <p>
            {{ $navTitle }}
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ">
        {{  $slot }}
    </ul>

</li>