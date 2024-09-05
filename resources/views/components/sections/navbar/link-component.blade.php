<li>
    <a href="{{ route($routeName) }}"
        class="nav-link scroll-link inline-block px-6 md:px-2  py-2 capitalize text-center cursor-pointer text-lg font-headers tracking-wider  leading-none {{ request()->routeIs($routeName) ? 'text-egg' : 'text-main-900' }}">
        {{ __('nav.' . $routeName) }}
    </a>
</li>
