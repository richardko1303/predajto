<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inzerat extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'important_info',
        'price',
        'location',
        'email',
        'phone',
        'user_id',
        'sub_category_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function inzeratFeatures(): HasMany
    {
        return $this->hasMany(InzeratFeature::class);
    }
}
