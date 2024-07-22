<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Illustration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function createdAtMonth()
    {
        return Carbon::parse($this->created_at)->monthName;
    }

    public function createdAtYear()
    {
        return Carbon::parse($this->created_at)->format('Y');
    }
}
