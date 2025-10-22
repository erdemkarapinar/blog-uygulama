<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function creating(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }

    public function created(Category $category): void
    {
        \Log::info("New Category Created: {$category->name}");
    }

    public function updating(Category $category): void
    {
        if ($category->isDirty('name')) {
            $category->slug = Str::slug($category->name);
        }

        if (auth()->check()) {
            $category->updated_by = auth()->id();
        }
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        \Log::warning("Category Deleted: {$category->name}");
    }
}    