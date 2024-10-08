<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Language;
use App\Models\Media;
use App\Models\Project;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SeedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command populates database with initial data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->seedAdmin();
        $this->seedLanguages();
        $this->seedGenres();
        $this->seedProjects();
        $this->seedIllustrations();
    }

    public function seedAdmin()
    {
        User::create([
            'name'      => 'admin',
            'email'     => config('admin.email'),
            'password'  => config('admin.password'),
        ]);
    }

    private function getUser()
    {
        return User::all()->first()->id;
    }

    public function seedLanguages()
    {
        $languages = ['HTML', 'CSS', 'PHP', 'JavaScript', 'React', 'TypeScript', 'Laravel', 'Symfony', 'WordPress', 'NodeJS'];

        collect($languages)->each(function (string $language) {
            Language::create([
                'name'       => $language,
                'svg'        => '<x-svg.' . Str::lower($language) . ' />'
            ]);
        });
    }

    public function seedGenres()
    {
        $genres = ['watercolor', 'mixed-media', 'food', 'animals', 'botanical', 'sketch', 'ink', 'christmas', 'winter', 'autumn', 'summer', 'spring', 'cities', 'humans'];

        collect($genres)->each(function (string $genre) {
            Genre::create([
                'name'       => $genre
            ]);
        });
    }

    public function seedProjects()
    {
        $user = $this->getUser();

        $projects = [
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_WEB,
                'title'         => 'Playlist Project',
                'project_data'  => [
                    'description'   => "<p>This project was a big milestone in my “becoming a web developer” adventure. It was a real-life case from a client, where I had to come up with a solution. Necessary to mention that it was my final graduation project of a 9 months training program in l'IDEM. My work received a very positive feedback from the members of the jury and <strong>was considered the best final project amongst all the students of our class</strong>.</p>
                    <h3 class='text-h5 mt-4 mb-2'>Main Idea</h3>
                    <p>To offer a comprehensive solution to establishment (company) owners to not only manage their menus online (that became a common practice especially in the post-COVID era) but also to create a unique musical atmosphere for their establishments that reflects the tastes and character of their customers using the Spotify Web API.</p>
                    <p>Under Spotify Developer Policy my application is considered as <strong>non-streaming SDA</strong>. In other words, it is an application that does not provide any streaming functionality. Spotify Web API is used exclusively for data research and playlist management.</p>
                    <h3 class='text-h5 mt-4 mb-2'>Project  Stack and Configuration</h3>
                    <p>My project is full-stack. <strong>Laravel</strong> is used for back-end development and <strong>React.js/Material UI</strong> for the front-end.</p>
                    <p>For the local development of my application, I used a docker stack: a classic <strong>LAMP environment</strong> (linux, apache, mysql and php) easy to set up thanks to a docker-compose file and which is based on an initial package similar to this <a class='underline' target='_blank' href='https://github.com/sprintcube/docker-compose-lamp'>one</a> found on Github.</p>
                    <p>To enable the use of the Spotify Web API, I configured <strong>client_id</strong> and <strong>client_secret</strong> in <strong>Spotify Dashboard</strong>. Finally I found a <a class='underline' target='_blank' href='https://github.com/jwilsson/spotify-web-api-php'>Spotify Web API Package for PHP (SDK)</a> that helped me to manage HTTP requests without manual API integration into a PHP/Laravel environment.</p>
                    <h3 class='text-h5 mt-4 mb-2'>What did I learn?</h3>
                    <p>The project helped me to discover a few fundamental concepts in web development and enrich my technical skills. In the list down-below I mention the main subjects that I personally find the most interesting in this project. Do not hesitate to visit my github repository to check out the code implementation.</p>
                    <ul>
                    <li>Concept of “stateless” and “stateful” authentication using the Spotify OAuth 2.0. I use <strong>Client Credentials Flow</strong> (stateless authentication) to search for songs in the Spotify catalog and <strong>Authorization Code Flow</strong> (stateful authentication) to connect a company manager/owner to the Spotify API server, create company's playlist, synchronize the “local” playlist with his/her Spotify playlist. </li>
                    <li>Study <strong>powerful Laravel features and concepts</strong> like API Resources, Form Request Validation, Middleware and Policies, Application Localization, Laravel Collections, Model Binding and Dependency Injections, etc.</li>
                    <li>In front-end development I used an efficient state management solution <strong>Zustand</strong>, implemented the <strong>concept of “optimistic updates”</strong> to provide an immediate feedback to the end-user and <strong>“debounce” hook</strong> for the song search to improve a user experience. I created <strong>a personalized theme with MUI</strong> and I also integrated an option to change programatically the main theme color of the whole application. In several clicks it is possible to change the character of the whole application. Isn't that awesome?</li>
                    <li>Create <strong>Laravel Command</strong> to synchronize the playlists using Spotify snapshot ID and to <strong>configure a cron job</strong> to run this command every midnight. Snapshot ID is an instrument of the version control within the Spotify API framework. To synchronize a local playlist and company's playlist available directly on the Spotify server is a complexe operation that consists of comparing the snapshot ID of local and public playlists and depending on the result, the workflow of the Laravel Command changes. </li>
                    </ul>",
                    'github'        => 'https://github.com/purplena/playlist-app'
                ],
                'images'        => ['media/playlist-1.png', 'media/playlist-2.png', 'media/playlist-3.png', 'media/playlist-4.png', 'media/playlist-5.png', 'media/playlist-6.png'],
                'languages'     => ['HTML', 'CSS', 'Laravel', 'React']
            ],
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_WEB,
                'title'         => 'MapBox JS Project',
                'project_data'  => [
                    'description'   => "<p>Mapbox Project was the first time I tried to work with the <strong>third-party library namely Mapbox GL JS</strong> to add a custom interactive map to my web page.</p>
                    <p>The goal of this exercise was to create a simple web application that is connected with a user's local storage and keeps track of “events” that a user adds on a map in the form of markers. These <strong>markers interact with the local storage and change color</strong> when the event approaches. A marker stays green when we still have more than 1 week before the event. Once we have less than 7 days left, it changes its color to yellow. Finally, it becomes red once the event has started.</p>
                    <p>When we talk about adding something to a map, it means that this something can be edited, deleted or simply consulted when needed. As you understand I talk about a CRUD executed in JavaScript and applied to the local storage.</p>
                    <p>I really liked this project. Especially the part when I could create a custom interface for my map. So you can clearly see that we are not in the classic color scheme of Google Maps anymore :)</p>",
                    'github'        => 'https://github.com/purplena/Javascript-Mapbox-project',
                    'link'          => 'https://purplena.github.io/Javascript-Mapbox-project/'
                ],
                'images'        => ['media/mapbox-1.png', 'media/mapbox-2.png', 'media/mapbox-3.png'],
                'languages'     => ['HTML', 'CSS', 'JavaScript']
            ],
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_WEB,
                'title'         => 'JS Vendor Machine',
                'project_data'  => [
                    'description'   => "<p><strong>Vendor Machine Project</strong> is my first-ever project in JavaScript. I started learning programming in a non-conventional way. After HTML/CSS, I jumped into 'the rabbit hole' of PHP. I'm still there, by the way. This website is built with the best PHP framework, Laravel. I loved back-end development so much that JavaScript and UI/UX have always been 'on hold'. I discovered the basics of JavaScript during my training at l'IDEM and, well... it was not love at first sight! Nowadays, the situation has changed, and I am keen on integrating more and more user experience into my web pages.</p>
                    <p>Talking about the project itself: <strong>Vendor Machine</strong> is built entirely in HTML/CSS. Interactions are made with Vanilla JS. You can pick your drink, pay for it, and take it from a compartment at the bottom, just like in real life.</p>
                    <p>I decided to show you this project because I still remember how happy I was to discover data attributes and various JS properties and methods.</p>",
                    'github'        => 'https://github.com/purplena/vending-machine',
                    'link'          => 'https://purplena.github.io/vending-machine/'
                ],
                'images'        => ['media/vending-machine-1.png'],
                'languages'     => ['HTML', 'CSS', 'JavaScript']
            ],
        ];

        collect($projects)->each(function ($project) {
            $newProject = Project::create([
                'user_id'       => $project['user_id'],
                'category'      => $project['category'],
                'title'         => $project['title'],
                'project_data'  => $project['project_data'],
            ]);

            if(Arr::exists($project, 'languages')) {
                collect($project['languages'])->each(function (string $language) use ($newProject) {
                    $languageId = Language::where('name', $language)->first()->id;
                    $newProject->languages()->attach($languageId);
                });
            }

            collect($project['images'])->each(function (string $image) use ($newProject) {
                Media::create([
                    'project_id' => $newProject->id,
                    'path'       => $image
                ]);
            });
        });
    }

    private function generateIllustrationNames($name, $counter)
    {
        $i = 1;
        $illustrations = [];
        for ($i; $i <= $counter; $i++) {
            array_push($illustrations, 'media/' . $name . '_' . $i . '.jpg');
        }

        return $illustrations;
    }

    public function generateIllustrationArrays($genre, $nbr)
    {
        $nbrProjects = collect($this->generateIllustrationNames($genre, $nbr))->count();
        $i = 0;
        $illustrations = [];
        for($i = 0; $i < $nbrProjects; $i++) {
            array_push($illustrations, [
                'user_id'       => $this->getUser(),
                'category'      => Project::CATEGORY_ART,
                'genre'         => $genre,
                'images'        => $this->generateIllustrationNames($genre, $nbr)[$i]
            ]);
        }

        return $illustrations;
    }

    public function seedIllustrations()
    {
        $data = [
            [
                'genre' => 'animals',
                'nbr'   => 3
            ],
            [
                'genre' => 'food',
                'nbr'   => 2
            ],
            [
                'genre' => 'botanical',
                'nbr'   => 23
            ],
            [
                'genre' => 'watercolor',
                'nbr'   => 4
            ]
        ];

        $result = [];

        foreach($data as $i) {
            array_push($result, $this->generateIllustrationArrays($i['genre'], $i['nbr']));
        }

        $finishedArray = collect($result)->flatten(1)->toArray();

        collect($finishedArray)->each(function ($i) {
            $genreId = Genre::where('name', $i['genre'])->first()->id;
            $newIllustration = Project::create([
                            'user_id'       => $i['user_id'],
                            'category'      => $i['category'],
                            'genre_id'      => $genreId

                        ]);

            Media::create([
                                    'project_id' => $newIllustration->id,
                                    'path'       => $i['images']
                                ]);
        });
    }
}
