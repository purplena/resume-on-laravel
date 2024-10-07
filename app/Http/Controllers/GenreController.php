<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

class GenreController extends Controller
{
    public function showAllByGenre(Genre $genre): JsonResponse
    {
        $projectsByGenre = Project::where('genre_id', '=', $genre->id)->with('medias')->get();

        return response()->json([
            'projectsByGenre'   => $projectsByGenre,
        ], HttpResponse::HTTP_OK);
    }
}
