<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Observers\PostObserver;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    // User Post İlişkisi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Kategori Post İlişkisi
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_posts');
    }

    public function registerMediaCollections(): void
    {
        // post görseli (tek dosya)
        $this->addMediaCollection('images')->singleFile();
    }

    // Yayınlanma Tarihi
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function boot(): void
    {
        Post::observe(PostObserver::class);
    }
}
