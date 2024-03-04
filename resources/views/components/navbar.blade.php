<header id="home">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-center">
            <div class="nav-header">
                <div class="flex flex-rox gap-4 justify-center items-center">
                    <i id="nav-logo" class="fa-solid fa-house text-[20px]" style="color: #a855f7;"></i>
                    @include('components/language_switcher')
                </div>
                <button type="button" class="nav-toggle" id="nav-toggle">
                    <i class="fas fa-bars menu-closed"></i>
                    <i class="fa-solid fa-x menu-open"></i>
                </button>
            </div>
            <!-- end of nav header -->

            <ul class="nav-links" id="nav-links">
                <li>
                    @auth
                        <a href="{{ route('admin') }}" class="nav-link scroll-link">{{ auth()->user()->name }}</a>
                    @endauth
                </li>
                <li>
                    <a href="/" class="nav-link scroll-link">home</a>
                </li>
                <li>
                    <a href="/gallery" class="nav-link scroll-link">gallery</a>
                </li>
                <li>
                    <a href="/contact" class="nav-link scroll-link">contact</a>
                </li>

            </ul>
            <!-- end of nav links -->
        </div>
    </nav>
    <!-- End of Navbar -->
</header>
