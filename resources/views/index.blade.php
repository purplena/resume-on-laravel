<x-page-layout>

    <!-- Section 1 Hero section -->
    <section class="about-section">
        <!-- Hero image -->
        <div class="hero-img-container section-1">
            <img src="./images/photo-of-me-purple-small.png" alt="img" class="hero-img" />
        </div>
        <!-- Hero Text -->
        <div class="about-container section-1">
            <h1>Hi, I'm Lena</h1>
            <p>
            <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
            @include('components/language_switcher')
            {{ __('home.welcome') }}
            <br />
            I am a junior web developper full-stack.
            <br />
            <br />
            My favorite color is purple. That's how the name of my website
            appeared.
            <br />
            <br />
            I started learnig programming in September 2022 and here is my first
            full-scale project.
            <br />
            <br />
            I am looking forward to working in your team and I am eager to be
            challenged in order to grow and further improve my developer skills.
            </p>
            <a href="#projects" class="btn btn-about-1">Projects</a>
            <a href="#skills" class="btn btn-about-2">Skills</a>
        </div>
    </section>

    <!-- Section 2 About section -->
    <section class="section-2-introduction" id="about">
        <div class="section-2-container">
            <article class="section-2-text section-2">
                <h2>A bit about me</h2>
                <p>

                    Working in web development has always been my dream. First
                    my curiosity made me discover the world of digital illustration and
                    design. It was a logical path taking into account that I liked
                    drawing myself. I invite you to check my works.
                    <br />
                    <br />
                    Looking back at my professional experience, I think web development
                    is a logical choice for me. I like modern technologies, always ready
                    to learn something new, I am patient and okay with spending several
                    hours on finding out a small bug.
                    <br />
                    <br />
                    It's challenging to restart your carrier almost from scratch, find
                    yourself again being a student who is making the first baby steps in
                    building her experience. But nevertheless, I feel that I am on the
                    right way.
                </p>
            </article>
            <article class="section-2-education section-2">
                <div class="div-section-2">
                    <h4>Education</h4>
                    <i class="fa-solid fa-graduation-cap about-section-icon"></i>
                    <p>
                        <span class="bold-span">Masters of International Relations</span>
                        <br />
                        National Research Nuclear University MEPhI <br />
                        Year of graduation: 2015
                    </p>
                </div>
                <div class="div-section-2">
                    <h4>Languages</h4>
                    <i class="fa-regular fa-comments about-section-icon"></i>
                    <p>English - C1</p>
                    <p>French - B1</p>
                    <p>Russian - native</p>
                </div>
                <div class="div-section-2">
                    <h4>FIND ME</h4>
                    <p>Want to know more my work?</p>
                    <div class="social-icons-container">
                        <a href="https://www.linkedin.com/in/elena-khramova-4a800b84/" target="_blank"><img
                                src="/images/linkedin.png" alt="pexels icon linkedin" /></a>
                        <a href="https://github.com/purplena" target="_blank"><img src="/images/github.png"
                                alt="pexels icon github" /></a>
                    </div>
            </article>
            <article class="section-2-work section-2">
                <div class="div-section-2">
                    <h4>Work experience</h4>
                    <i class="fa-solid fa-briefcase about-section-icon"></i>
                    <p>
                        5+ years in FMCG business <br />
                        American multinational corporation
                        <span class="bold-span">PepsiCo Inc.</span> <br /><span class="bold-span-green">What did I
                            get?</span>
                        <br />Huge professional boost, deep knowledge of FMCG business,
                        excellent organisational and comunication skills.
                        <br />
                        From 2013 to 2019
                    </p>
                </div>
                <div class="div-section-2">
                    <h4>IT Skills</h4>
                    <i class="fa-solid fa-code about-section-icon"></i>
                    <p>HTML/CSS/SASS & Tailwind basics</p>
                    <p>PHP & OOP</p>
                    <p>Laravel basics</p>
                    <p>MySQL</p>
                    <p>Github & Git Version Control</p>
                    <p>Photoshop & Illustrator</p>
                </div>
        </div>
        </article>
        </div>
    </section>

    <!-- Skills Section ----Section 4 -->
    <section class="section-4" id="skills">
        <h1>What are my skills?</h1>
        <div class="section-4-container">
            <!-- single item -->
            <article class="section-4-item">
                <i class="fa-regular fa-lightbulb section-4-icon"></i>
                <h3>HTML/CSS/SASS</h3>
                <p>
                    Everyone starts with their first static wed site based on classical HTML ans CSS. It is a solid
                    fundation to every web developper. I was not an exeption.
                </p>
                <p>
                    I finished two series:
                </p>
                <p>
                    Series 1: <span style="font-weight: 700;"><a
                            href="https://www.udemy.com/course/in-depth-html-css-course-build-responsive-websites/?referralCode=40C89DF13A25C5EC2CCF"
                            target="_blank">HTML&CSS Tutorial and Projects Course 2022 (Flexbox&Grid)</a></span> by
                    <a href="https://github.com/john-smilga" target="_blank">John Smilga</a> on <a
                        href="https://www.udemy.com/" target="_blank">udemy.com</a>
                </p>
                <p>
                    Series 2: <span style="font-weight: 700;"><a
                            href="https://laracasts.com/series/html-and-css-workshop" target="_blank">HTML and CSS
                            Workshop/Tailwind</a></span> by <a href="https://github.com/JeffreyWay"
                        target="_blank">Jeffrey
                        Way</a> on <a href="https://laracasts.com/" target="_blank">laracasts.com</a>
                </p>
            </article>
            <!-- single item -->
            <article class="section-4-item">
                <i class="fa-solid fa-code section-4-icon"></i>
                <h3>PHP/OOP</h3>
                <p>
                    As my first programming language I chose PHP because by combining in with HTML and CSS, you can
                    have
                    a fully operating website.
                </p>
                <p>
                    I finished two series:
                </p>
                <p>
                    Series 1: <span style="font-weight: 700;"><a href="https://laracasts.com/series/php-for-beginners"
                            target="_blank">The PHP
                            Practitioner</a></span> by <a href="https://github.com/JeffreyWay" target="_blank">Jeffrey
                        Way</a> on <a href="https://laracasts.com/" target="_blank">laracasts.com</a>
                </p>
                <p>
                    Series 2: <span style="font-weight: 700;"><a
                            href="https://laracasts.com/series/php-for-beginners-2023-edition" target="_blank">PHP
                            for
                            Beginners</a></span> by <a href="https://github.com/JeffreyWay" target="_blank">Jeffrey
                        Way</a> on <a href="https://laracasts.com/" target="_blank">laracasts.com</a>
                </p>
            </article>
            <!-- single item -->
            <article class="section-4-item">
                <i class="fa-regular fa-comments section-4-icon"></i>
                <h3>Laravel</h3>
                <p>
                    IT world is a constantly changing environment. To make your work well it is necessary to adapt
                    the
                    best practicies and discover new frameworks. Laravel is a universal tool for effective web
                    development.
                </p>
                <p>
                    I enjoy learning this framework with the series <span style="font-weight: 700;"><a
                            href="https://laracasts.com/series/laravel-8-from-scratch" target="_blank">Laravel 8
                            From
                            Scratch</a></span> by <a href="https://github.com/JeffreyWay" target="_blank">Jeffrey
                        Way</a> on <a href="https://laracasts.com/" target="_blank">laracasts.com</a>
                </p>
            </article>
            <!-- single item -->
            <article class="section-4-item">
                <i class="fa-regular fa-paper-plane section-4-icon"></i>
                <h3>GitHUB and SQL</h3>
                <p>
                    It is important to know how to use the specific tools. Git Version Control is one of the
                    important
                    pilars in organisation of your workflow. And do I need to indicate that without a sql request we
                    can
                    not make any website?
                </p>
                <p>
                    I finished two series:
                </p>
                <p>
                    Series 1: <span style="font-weight: 700;"><a
                            href="https://laracasts.com/series/git-me-some-version-control" target="_blank">Git Me
                            Some Version Control</a></span> by <a href="https://github.com/JeffreyWay"
                        target="_blank">Jeffrey Way</a> on <a href="https://laracasts.com/"
                        target="_blank">laracasts.com</a>
                </p>
                <p>
                    Series 2: <span style="font-weight: 700;"><a
                            href="https://laracasts.com/series/mysql-database-design" target="_blank">MySQL
                            Database
                            Design</a></span> by <a href="https://github.com/JeffreyWay" target="_blank">Jeffrey
                        Way</a> on <a href="https://laracasts.com/" target="_blank">laracasts.com</a>
                </p>
            </article>
        </div>
    </section>

    <!-- Projects Section - Section 5 -->
    <section class="section-5" id="projects">
        <h1>My projects</h1>
        <!-- single item -->
        <article class="project-1-container">
            <div class="project-1-flex-container">
                <div class="project-text">
                    <h3>Project 1 - TO-DO List Project</h3>
                    <p>
                        The very first attempt to apply the PHP knowledge to create a
                        real project with a practical value.
                        <br />
                        I made a website to create your personilised TO-DO List.
                        <br />
                        This project appeared after the course The PHP Practitioner by Jeffrey Way on laracasts.com.
                        This was the first PHP course finished in my life. I modified the original code of the
                        course to
                        create my first full CRUD cycle based on to-do list concept. As well I added an
                        authentication
                        layer that is essential for modern websites. In Task section you can create your tasks and
                        edit
                        them.
                    </p>
                </div>
                <div class="projects-image-container">
                    <a href="https://www.tasks.purplena.dev/" target="_blank" class="project-link">
                        <img src="./images/project-1-1.png" alt="image-of-project" />
                        <i class="fa fa-search project-icon"></i>
                    </a>
                    <a href="https://www.tasks.purplena.dev/" target="_blank" class="project-link">
                        <img src="./images/project-1-2.png" alt="image-of-project" />
                        <i class="fa fa-search project-icon"></i>
                    </a>
                </div>
            </div>
            <a href="https://www.tasks.purplena.dev/" target="_blank" class="btn">visit me</a>
        </article>
        <!-- end of single item -->
    </section>
</x-page-layout>
