<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'path'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function createdAtMonth(): string
    {
        return Carbon::parse($this->created_at)->monthName;
    }

    public function createdAtYear(): string
    {
        return Carbon::parse($this->created_at)->format('Y');
    }
}
