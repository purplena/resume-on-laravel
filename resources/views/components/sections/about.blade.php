<section class="bg-main-200 rounded-3xl mb-12 px-4 py-12">
    <div class="max-w-maxScreenWidth mx-auto">
        <div class="flex flex-row justify-between">
            <h2 class="text-h3 mb-4">A bit about me</h2>
            <p class="text-right">
                <span class="text-main-700 font-bold">Curiosity</span> is my tool<br>
                <span class="text-main-700 font-bold">New knowledge</span> is my passion
            </p>
        </div>
        <div class="bg-main-400 h-[1px] mb-4"></div>
        <div class="flex flex-col gap-2 md:grid md:grid-cols-3">
            <x-sections.components.about-section header="education" icon="fa-solid fa-graduation-cap about-section-icon">
                <p class="text-center">
                    <span class="font-bold text-[16px]">Masters of International Relations</span></br>
                    National Research Nuclear University MEPhI</br>
                    Year of graduation: 2015</br>
                    Location: Moscow, Russia
                </p>
                <p class="text-center">
                    <span class="font-bold text-[16px]">Web and Mobile Development</span></br>
                    École Supérieure des Métiers créatifs et numériques</br>
                    Year of graduation: 2024</br>
                    Location: Perpignan, France
                </p>
            </x-sections.components.about-section>

            <x-sections.components.about-section header="work experience"
                icon="fa-solid fa-briefcase about-section-icon">
                <p class="text-center">
                    <span class="font-bold text-[16px]">Sales Capability, PepsiCo</span></br>
                    Huge professional boost</br>
                    Deep knowledge of FMCG business</br>
                    Excellent organizational and communication skills</br>
                    2013-2019
                </p>
                <p class="text-center">
                    <span class="font-bold text-[16px]">Freelance, Web Development</span></br>
                    Constant work on my technical skills</br>
                    2023-2024
                </p>
            </x-sections.components.about-section>

            <x-sections.components.about-section header="IT Skills" icon="fa-solid fa-code about-section-icon">
                <div class="flex flex-col items-center">
                    <p class="font-bold text-[16px]">
                        Full-Stack
                    </p>
                    <p>HTML/CSS/SASS</p>
                    <p>Bootstrap/Tailwind/MUI</p>
                    <p>Javascript</p>
                    <p>React.js</p>
                    <p>PHP & OOP</p>
                    <p>Laravel</p>
                    <p>Symfony</p>
                    <p>MySQL</p>
                    <p>Github & Git Version Control</p>
                    <p>Figma</p>
                </div>
            </x-sections.components.about-section>
        </div>
    </div>
</section>
