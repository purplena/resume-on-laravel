<header id="home">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-center">
            <div class="nav-header">
                <img src="./images/logo1.png" alt="logo" class="nav-logo" id="nav-logo" />
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
