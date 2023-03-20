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
                <!-- single link -->
                <li>
                    <a href="<?php echo $_SERVER['REQUEST_URI'] === '/gallery' ? '/' : '#about'; ?>" class="nav-link scroll-link">about</a>
                </li>

                <!-- end og single link -->
                <!-- single link -->
                <li>
                    <a href="#skills" class="nav-link scroll-link">my skills</a>
                </li>
                <!-- end og single link -->
                <!-- single link -->
                <li>
                    <a href="#projects" class="nav-link scroll-link"> Projects</a>
                </li>
                <!-- end og single link -->
                <!-- single link -->
                <li>
                    <a href="#artworks" class="nav-link scroll-link">art</a>
                </li>
                <!-- end og single link -->
                <!-- single link -->
                <li>
                    <a href="#contact" class="nav-link scroll-link">contact</a>
                </li>
                <!-- end of single link -->
            </ul>
            <!-- end of nav links -->
        </div>
    </nav>
    <!-- End of Navbar -->
</header>
