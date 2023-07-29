<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
        'state_id',
        'city_id',
        'description',
        'is_adopted',
        'is_visible',
        'has_special_needs',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
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
        return "{$this->city->title} - {$this->state->letter}";
    }

    public function getAdoptionStatusAttribute(): string
    {
        return $this->is_adopted ? 'Adopted' : 'Available';
    }

    public function getAdoptionStatusColorAttribute(): string
    {
        return $this->is_adopted ? 'yellow' : 'green';
    }

    public function getMainPhotoAttribute(): string
    {
        return $this->getFirstMediaUrl('pets');
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('pets-gallery');
    }

    public function hasAdditionalInfo(): bool
    {
        return $this->description ||
            $this->sociabilities->isNotEmpty() ||
            $this->temperaments->isNotEmpty() ||
            $this->veterinaryCares->isNotEmpty();
    }
}