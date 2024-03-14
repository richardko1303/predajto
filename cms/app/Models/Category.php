<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function Inzerats(): HasManyThrough
    {
        return $this->hasManyThrough(Inzerat::class, SubCategory::class);
    }
}
