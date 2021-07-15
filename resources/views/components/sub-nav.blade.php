<nav class="sub-nav">
    <ul>
        <li style="background: black;">
            <span style="color: #fff;font-weight: bold;">Classifieds</span>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'all') ? 'current' : '' }}">
            <a href="/all" class="nav-link">all</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'keyboards') ? 'current' : '' }}">
            <a href="/keyboards" class="nav-link">keyboards</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'keycaps') ? 'current' : '' }}">
            <a href="/keycaps" class="nav-link">keycaps</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'artisan') ? 'current' : '' }}">
            <a href="/artisans" class="nav-link">artisans</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'switches') ? 'current' : '' }}">
            <a href="/switches" class="nav-link">switches</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'pcbs') ? 'current' : '' }}">
            <a href="/pcbs" class="nav-link">pcbs</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'other') ? 'current' : '' }}">
            <a href="/other" class="nav-link">other</a>
        </li>

        <li class="{{ str_contains(request()->route()->uri,'listings') ? 'current' : '' }}">
            <a href="/listings" class="nav-link bold">&plus; CREATE LISTING</a>
        </li>
    </ul>
</nav>
