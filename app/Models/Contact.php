<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contact extends Model
{
    use HasFactory;

    public $fillable = ['name', 'email', 'message'];

    public static function boot(): void
    {
        parent::boot();

        static::created(function ($item) {
            Mail::to(config('admin.email'))->send(new ContactMail($item));
        });
    }
}
