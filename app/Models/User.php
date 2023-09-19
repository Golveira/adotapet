<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'state',
        'city',
        'website',
        'whatsapp',
        'location',
        'bio',
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

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class, 'bookmarks');
    }

    public function hasBookmarked(Pet $pet): bool
    {
        return $this->bookmarks->contains($pet);
    }

    public function bookmark(Pet $pet)
    {
        $this->bookmarks()->attach($pet);
    }

    public function unbookmark(Pet $pet)
    {
        $this->bookmarks()->detach($pet);
    }

    public function toggleBookmark(Pet $pet)
    {
        $this->bookmarks()->toggle($pet);
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
