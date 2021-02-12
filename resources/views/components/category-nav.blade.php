<nav id="category_nav" class="nav-bar category-nav">
    <ul>
        <li class="{{ empty(app('request')->input('filter') || app('request')->input('filter') == 'all') ? 'current' : '' }}"><a href="{{ route($route) }}">all</a></li>
        <li class="{{ app('request')->input('filter') == 'keyboards' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'keyboards']) }}">keyboards</a></li>
        <li class="{{ app('request')->input('filter') == 'keycaps' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'keycaps']) }}">keycaps</a></li>
        <li class="{{ app('request')->input('filter') == 'artisans' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'artisans']) }}">artisans</a></li>
        <li class="{{ app('request')->input('filter') == 'switches' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'switches']) }}">switches</a></li>
        <li class="{{ app('request')->input('filter') == 'pcbs' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'pcbs']) }}">pcbs</a></li>
        <li class="{{ app('request')->input('filter') == 'other' ? 'current' : '' }}"><a href="{{ route($route, ['filter' => 'other']) }}">other</a></li>
    </ul>
</nav>
