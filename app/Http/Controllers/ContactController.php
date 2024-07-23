<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): JsonResponse
    {
        Contact::create($request->only(['name', 'email', 'message']));

        return response()->json(['success' => true, 'message' => __('contact-form-success')], 200);
    }
}
