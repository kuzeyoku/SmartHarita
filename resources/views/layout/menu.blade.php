<li class="{{ $menu->subMenu->isNotEmpty() ? 'has-droupdown' : '' }}">
    <a href="{{ $menu->url ?? '#' }}">{{ $menu->title }}</a>
    <ul class="submenu">
        @foreach ($menu->subMenu as $subMenu)
            @if ($subMenu->subMenu->isNotEmpty())
                @include('layout.menu', ['menu' => $subMenu])
            @else
                <li><a href="{{ $subMenu->url }}">{{ $subMenu->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
