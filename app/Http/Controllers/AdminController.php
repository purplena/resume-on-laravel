<?php

namespace App\Http\Controllers;

use App\Repository\IllustrationRepository;

class AdminController extends Controller
{
    public function __construct(private IllustrationRepository $illustrationRepository)
    {
    }

    public function index()
    {
        return view(
            'admin.index',
            [
                'illustrationsThisMonth' => $this->illustrationRepository->illustrationsThisMonth(),
                'illustrationsThisYear' => $this->illustrationRepository->illustrationsThisYear()
            ],
        );
    }
}
