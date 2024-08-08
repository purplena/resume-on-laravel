<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\JsonResponse;

class MediaController extends Controller
{
    public function destroy(Media $media): JsonResponse
    {
        $media->delete();

        return response()->json(['status' => "you deleted a project's picture" ], HttpResponse::HTTP_OK);
    }
}
