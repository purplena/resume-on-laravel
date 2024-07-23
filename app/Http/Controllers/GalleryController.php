<?php

namespace App\Http\Controllers;

use App\Repository\IllustrationRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request, IllustrationRepository $repository): View
    {
        $illustrations = $repository->search($request, 20);
        return view('gallery', [
            'illustrations' => $illustrations,
        ]);
    }
}
