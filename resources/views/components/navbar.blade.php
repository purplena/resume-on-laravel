<header id="home">
    <nav class="navbar fixed bg-main-500 rounded-3xl px-6 py-2 top-2 left-1/2 transform -translate-x-1/2 w-[calc(100%_-_2rem)] max-w-maxScreenWidth"
        id="navbar">
        <div class="nav-center md:flex md:justify-between md:items-center flex-wrap">
            <div class="nav-header flex flex-row justify-between items-center">
                <div class="flex flex-row aligh-center items-center">
                    <x-sections.components.language-switcher />
                    <div class="h-[28px] w-[28px] relative theme-switcher">
                        <i
                            class="fa-solid fa-lightbulb fa-xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 cursor-pointer text-egg"></i>
                    </div>
                </div>
                <div class="hamburger md:hidden">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="links-container"
                class="links-container h-0 overflow-hidden transition-all duration-300 ease-linear md:!h-auto">
                <ul class="links flex flex-col items-center md:flex-row md:gap-4" id="nav-links">
                    <x-sections.navbar.link-component routeName="home" />
                    <x-sections.navbar.link-component routeName="gallery" />
                    <x-sections.navbar.link-component routeName="projects" />
                    @auth
                        <x-sections.navbar.link-component routeName="admin" />
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


</header>
