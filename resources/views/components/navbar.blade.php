<header id="home">
    <nav class="navbar fixed z-10 bg-main-500 rounded-3xl px-6 py-4 top-2 left-1/2 transform -translate-x-1/2 w-[calc(100%_-_2rem)] max-w-maxScreenWidth"
        id="navbar">
        <div class="nav-center md:flex md:justify-between md:items-center flex-wrap">
            <div class="nav-header flex flex-row justify-between items-center">
                <x-sections.components.language-switcher />
                <div class="nav-toggle w-[28px] h-[28px] text-main-900 text-[18px] cursor-pointer relative pr-4 transition-all duration-300 ease-linear md:hidden"
                    id="nav-toggle">
                    <i
                        class="fas fa-bars menu-closed absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                    <i
                        class="fa-solid fa-x menu-open absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden"></i>
                </div>
            </div>
            <div id="links-container"
                class="links-container h-0 overflow-hidden transition-all duration-300 ease-linear md:!h-auto">
                <ul class="links flex flex-col md:flex-row md:gap-4" id="nav-links">
                    <x-sections.navbar.link-component routeName="home" />
                    <x-sections.navbar.link-component routeName="gallery" />
                    <x-sections.navbar.link-component routeName="blog" />
                    @auth
                        <x-sections.navbar.link-component routeName="admin" />
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


</header>
