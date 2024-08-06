<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repository\ProjectRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request, ProjectRepository $repository): View
    {
        $projects = $repository->search($request, 20, Project::CATEGORY_ART);
        return view('gallery', [
            'projects' => $projects,
        ]);
    }
}
