<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:300',
        ]);

        //To discuss with you
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'message' => 'required|max:500',
        // ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()], 422);
        }

        Contact::create($request->all());

        return response()->json(['success' => true, 'message' => __('custom.contact-form-success')], 200);
    }
}
