<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'bio',
        'email',
        'email_verified_at',
        'password',
    ];
    
    // Post ilişkisi
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Media collection
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo')->singleFile();
    }

    // Profil Fotosu İçin Bağlantı Kısmı Eğer Kullanıcı Profil Fotoğrafı Koymamışsa Public images kısmındaki Default Fotoyu Otomatik Ekler
    public function getAvatarUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('profile_photo') ?: asset('images/default-profile.png');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
