<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
