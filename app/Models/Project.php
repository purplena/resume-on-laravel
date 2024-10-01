<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Project extends Model
{
    use HasFactory;

    public const CATEGORY_WEB = 1;

    public const CATEGORY_ART = 2;

    public const CATEGORYS = [
        self::CATEGORY_WEB,
        self::CATEGORY_ART,
    ];

    protected $fillable = ['user_id', 'category', 'title', 'project_data'];

    protected $casts = [
        'project_data' => 'array',
    ];

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function createdAtMonth(): string
    {
        return Carbon::parse($this->created_at)->monthName;
    }

    public function createdAtYear(): string
    {
        return Carbon::parse($this->created_at)->format('Y');
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'project_language', 'project_id', 'language_id');
    }
}
