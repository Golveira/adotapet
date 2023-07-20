<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Temperament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class);
    }
}
