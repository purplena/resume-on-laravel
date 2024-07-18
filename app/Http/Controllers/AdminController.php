<?php

namespace App\Http\Controllers;

use App\Services\IllustrationService;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(IllustrationService $service): View
    {
        return view(
            'admin.index',
            [
                'illustrationStats' => $service->getStats(),
            ],
        );
    }
}
