<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    // Post Kategori İlişkisi Birden Fazla Kategori Seçilmesi İçin belongsToMany
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'categories_posts');
    }

    public function registerMediaCollections(): void
    {
        // post görseli (tek dosya)
        $this->addMediaCollection('categories_images')->singleFile();
    }
}
