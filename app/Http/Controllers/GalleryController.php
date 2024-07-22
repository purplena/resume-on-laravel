<?php

namespace App\Http\Controllers;

use App\Models\Illustration;
use App\Repository\IllustrationRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct(private IllustrationRepository $repository)
    {
    }

    public function index(Request $request): View
    {
        $illustration = Illustration::find($request->id);
        $illustrations = $this->repository->search($request, 20);
        return view('gallery', [
            'illustrations' => $illustrations,
            'illustration' => $illustration
        ]);
    }
}
