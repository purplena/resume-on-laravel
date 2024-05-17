<header id="home">
    <nav class="navbar bg-main-500 rounded-3xl px-6 py-4" id="navbar">
        <div class="nav-center">
            <div class="nav-header flex flex-row justify-between">
                @include('components/language_switcher')
                <button type="button" class="nav-toggle" id="nav-toggle">
                    <i class="fas fa-bars menu-closed"></i>
                    <i class="fa-solid fa-x menu-open"></i>
                </button>
            </div>
            <ul class="nav-links" id="nav-links">
                <li>
                    @auth
                        <a href="{{ route('admin') }}" class="nav-link scroll-link">{{ auth()->user()->name }}</a>
                    @endauth
                </li>
                <li>
                    <a href="{{ route('home') }}" id="scrollToHomeBtn"
                        class="nav-link scroll-link {{ request()->routeIs('home') ? 'text-egg' : '' }}">home</a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}"
                        class="nav-link scroll-link {{ request()->routeIs('gallery') ? 'text-egg' : '' }}">gallery</a>
                </li>
            </ul>
        </div>
    </nav>


</header>
