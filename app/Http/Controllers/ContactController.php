<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        Contact::create($request->only(['name', 'email', 'message']));

        return response()->json(['success' => true, 'message' => __('contact-form-success')], 200);
    }
}
