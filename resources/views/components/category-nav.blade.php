<nav id="category_nav" class="nav-bar category-nav">
    <ul>
        <li class="{{ empty(request()->route('category')) ? 'current' : '' }}">
            <a href="{{ route($route) }}">all</a>
        </li>

        <li class="{{ request()->route('category') == 'keyboards' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'keyboards']) }}">keyboards</a>
        </li>

        <li class="{{ request()->route('category') == 'keycaps' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'keycaps']) }}">keycaps</a>
        </li>

        <li class="{{ request()->route('category') == 'artisans' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'artisans']) }}">artisans</a>
        </li>

        <li class="{{ request()->route('category') == 'switches' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'switches']) }}">switches</a>
        </li>

        <li class="{{ request()->route('category') == 'pcbs' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'pcbs']) }}">pcbs</a>
        </li>

        <li class="{{ request()->route('category') == 'other' ? 'current' : '' }}">
            <a href="{{ route($route, ['category' => 'other']) }}">other</a>
        </li>
    </ul>
</nav>
