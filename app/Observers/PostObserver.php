<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $post->slug = str()->slug($post->title);
    }

    public function created(Post $post)
    {
        \Log::info("New Post: {$post->title}");
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $post->updated_by = auth()->user();
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
