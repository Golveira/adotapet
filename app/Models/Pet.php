<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function getMainPhotoAttribute(): string
    {
        return $this->getFirstMediaUrl('pets');
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('*')->map(function (Media $media) {
            return $media->getFullUrl();
        });
    }
}
