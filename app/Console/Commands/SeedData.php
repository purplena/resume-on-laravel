<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Models\Project;
use App\Models\User;
use Illuminate\Console\Command;

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
        $this->seedProjects();
    }

    public function seedAdmin()
    {
        User::create([
            'name'      => 'admin',
            'email'     => config('admin.email'),
            'password'  => config('admin.password'),
        ]);
    }

    public function seedProjects()
    {
        $user = User::all()->first()->id;

        $projects = [
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_WEB,
                'title'         => 'MapBox JS Project',
                'project_data'  => [
                    'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'github'        => 'https://github.com/purplena/Javascript-Mapbox-project',
                    'link'          => 'https://purplena.github.io/Javascript-Mapbox-project/'
                ],
                'images'        => ['media/mapbox-1.png', 'media/mapbox-2.png', 'media/mapbox-3.png', 'media/mapbox-4.png', 'media/mapbox-5.png']
            ],
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_WEB,
                'title'         => 'JS Vendor Machine',
                'project_data'  => [
                    'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'github'        => 'https://github.com/purplena/vending-machine',
                ],
                'images'        => ['media/vending-machine-img1.png']
            ],
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_ART,
                'title'         => 'test illustration',
                'project_data'  => [],
                'images'        => ['media/test.jpg']
            ],
            [
                'user_id'       => $user,
                'category'      => Project::CATEGORY_ART,
                'title'         => 'purple',
                'project_data'  => [],
                'images'        => ['media/purple.jpg']
            ]
        ];

        collect($projects)->each(function ($project) {
            $newProject = Project::create([
                'user_id'       => $project['user_id'],
                'category'      => $project['category'],
                'title'         => $project['title'],
                'project_data'  => $project['project_data'],
            ]);

            collect($project['images'])->each(function ($image) use ($newProject) {
                Media::create([
                    'project_id' => $newProject->id,
                    'path'       => $image
                ]);
            });
        });
    }
}
