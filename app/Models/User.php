<?php

namespace App\Models;

use App\Models\City;
use App\Models\State;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'is_admin',
        'website',
        'whatsapp',
        'bio',
        'state_id',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class, 'favorites');
    }

    public function hasFavorited(Pet $pet): bool
    {
        return $this->favorites->contains($pet);
    }

    public function favorite(Pet $pet)
    {
        $this->favorites()->attach($pet);
    }

    public function unfavorite(Pet $pet)
    {
        $this->favorites()->detach($pet);
    }

    public function toggleFavorite(Pet $pet)
    {
        $this->favorites()->toggle($pet);
    }

    public function getRoleAttribute(): string
    {
        return $this->is_admin ? 'Admin' : 'User';
    }

    public function getRoleColorAttribute(): string
    {
        return $this->is_admin ? 'danger' : 'primary';
    }

    public function getAvatarAttribute(): string
    {
        return $this->getFirstMediaUrl('avatars');
    }

    public function getAddressAttribute(): string
    {
        return $this->state && $this->city ? "{$this->city->title}, {$this->state->letter}" : '';
    }

    public function getRedirectRoute()
    {
        return $this->is_admin ? 'admin.home' : 'welcome';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->useFallbackUrl(asset('assets/images/user.png'))
            ->singleFile();
    }
}
