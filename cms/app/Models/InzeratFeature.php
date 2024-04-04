<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InzeratFeature extends Model
{
    use HasFactory;

    public function inzerat(): BelongsTo
    {
        return $this->belongsTo(Inzerat::class);
    }
}
