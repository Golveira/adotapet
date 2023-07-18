<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pet extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'name',
        'specie',
        'sex',
        'age',
        'size',
        'state',
        'city',
        'description',
        'is_adopted',
        'is_visible',
        'has_special_needs',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sociabilities(): BelongsToMany
    {
        return $this->belongsToMany(Sociability::class);
    }

    public function temperaments(): BelongsToMany
    {
        return $this->belongsToMany(Temperament::class);
    }

    public function veterinaryCares(): BelongsToMany
    {
        return $this->belongsToMany(VeterinaryCare::class);
    }

    public function getAddressAttribute(): string
    {
        return "{$this->city} - {$this->state}";
    }

    public function getAdoptionStatusAttribute(): string
    {
        return $this->is_adopted ? 'Adopted' : 'Available';
    }

    public function getAdoptionStatusColorAttribute(): string
    {
        return $this->is_adopted ? 'yellow' : 'green';
    }
}
