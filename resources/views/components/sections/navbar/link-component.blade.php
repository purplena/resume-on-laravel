<li>
    <a href="{{ route($routeName) }}"
        class="nav-link scroll-link block py-2 capitalize text-center cursor-pointer text-lg font-headers tracking-wider  leading-none hover:text-egg md:p-0 {{ request()->routeIs($routeName) ? 'text-egg' : 'text-main-900' }}">
        {{ __('nav.' . $routeName) }}
    </a>
</li>
