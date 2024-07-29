<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index(): View
    {
        $webProjects = Project::where('category', '=', Project::CATEGORY_WEB)->get();

        return view('index', [
            'webProjects' => $webProjects,
            'coordinates' => $this->generateBlob()
        ]);
    }

    public function generateBlob(): array
    {
        return Arr::shuffle($this->blobCoordinates());
    }

    private function blobCoordinates(): array
    {
        return [
            "M15.2,-23.6C22.3,-19,32.7,-19.3,34.9,-15.6C37.1,-11.9,31.1,-4.1,30.1,4.5C29.1,13,32.9,22.4,30.1,26.7C27.4,31,18,30.1,10,31.2C2,32.2,-4.6,35.2,-10.1,33.9C-15.6,32.5,-19.9,26.7,-23.7,21.2C-27.5,15.6,-30.9,10.3,-34.3,3.4C-37.6,-3.5,-41,-11.9,-39.4,-19.1C-37.9,-26.4,-31.4,-32.6,-24,-37.1C-16.6,-41.6,-8.3,-44.4,-2.1,-41C4,-37.7,8,-28.2,15.2,-23.6Z",
            "M18.5,-27.2C24,-25.2,28.7,-20.2,30.4,-14.4C32.2,-8.7,31.1,-2.2,30.1,4.3C29.2,10.8,28.4,17.4,25.2,22.7C21.9,28.1,16.3,32.2,10.3,33.1C4.3,34,-2.2,31.6,-9.8,30.6C-17.4,29.6,-26.2,30,-31.7,26.1C-37.2,22.2,-39.5,14.1,-40.2,6.1C-40.9,-2,-40,-9.9,-37.5,-17.8C-35,-25.7,-30.8,-33.5,-24.3,-35.1C-17.7,-36.7,-8.9,-32,-1.2,-30.2C6.5,-28.3,12.9,-29.2,18.5,-27.2Z",
            "M23.8,-32.3C31.4,-32.2,38.4,-26.5,39.5,-19.4C40.7,-12.3,35.9,-3.9,31.9,2.6C27.8,9.1,24.4,13.6,20.9,18.5C17.3,23.3,13.5,28.3,8.7,29.9C3.8,31.6,-2.2,29.7,-7.7,27.5C-13.1,25.3,-18,22.6,-21.4,18.6C-24.7,14.6,-26.5,9.3,-29.8,2.8C-33.1,-3.8,-37.9,-11.6,-37.4,-18.9C-36.9,-26.1,-31.1,-32.7,-24,-33C-16.8,-33.3,-8.4,-27.3,-0.1,-27.1C8.1,-26.9,16.3,-32.4,23.8,-32.3Z",
            "M23.3,-36.5C30.2,-31.8,35.7,-25.3,35.4,-18.4C35.1,-11.5,29,-4.1,26,2.5C23.1,9.1,23.5,14.9,21.6,20.8C19.7,26.8,15.6,33,9.9,35.6C4.1,38.3,-3.3,37.4,-11.4,36.2C-19.5,35,-28.4,33.6,-30.8,28.2C-33.2,22.7,-29.2,13.2,-26.6,6.1C-24.1,-1,-23.1,-5.5,-22.3,-11.3C-21.4,-17.2,-20.8,-24.2,-17.1,-30.4C-13.4,-36.6,-6.7,-41.9,0.8,-43.1C8.2,-44.2,16.4,-41.3,23.3,-36.5Z",
            "M14,-20.9C19.7,-18.2,26.8,-16.8,29.4,-12.9C32,-9,30.1,-2.5,30.5,5.4C31,13.3,33.8,22.5,30.2,25.6C26.6,28.7,16.6,25.6,8.8,26.3C0.9,27,-4.8,31.4,-9.8,31C-14.9,30.7,-19.2,25.5,-23.3,20.4C-27.4,15.3,-31.2,10.2,-31.1,5C-31,-0.1,-27,-5.3,-23.4,-9.6C-19.7,-13.9,-16.5,-17.3,-12.7,-20.9C-8.9,-24.5,-4.4,-28.3,-0.1,-28.1C4.2,-27.9,8.4,-23.7,14,-20.9Z",
            "M15.2,-23.6C22.3,-19,32.7,-19.3,34.9,-15.6C37.1,-11.9,31.1,-4.1,30.1,4.5C29.1,13,32.9,22.4,30.1,26.7C27.4,31,18,30.1,10,31.2C2,32.2,-4.6,35.2,-10.1,33.9C-15.6,32.5,-19.9,26.7,-23.7,21.2C-27.5,15.6,-30.9,10.3,-34.3,3.4C-37.6,-3.5,-41,-11.9,-39.4,-19.1C-37.9,-26.4,-31.4,-32.6,-24,-37.1C-16.6,-41.6,-8.3,-44.4,-2.1,-41C4,-37.7,8,-28.2,15.2,-23.6Z"
        ];
    }
}
