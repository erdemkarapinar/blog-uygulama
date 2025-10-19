<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        $post->slug = Str::slug($post->title);
    }

    public function created(Post $post): void
    {
        \Log::info("New Post Created: {$post->title}");
    }

    public function updating(Post $post): void
    {
        if ($post->isDirty('title')) {
            $post->slug = Str::slug($post->title);
        }

        if (auth()->check()) {
            $post->updated_by = auth()->id();
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        \Log::warning("Post Deleted: {$post->title}");
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
