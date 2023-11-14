<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserve
{
    /**
     * Handle the Category "created" event.
     */
    public function creating(Category $category): void
    {
        if (is_null($category->order))
        {
            $category->order = Category::query()->max('order') + 1;
            return;
        }
        $lowerPriorityCategories = Category::query()
            ->where('order','>=',$category->order)
            ->get();
        foreach ($lowerPriorityCategories as $lowerPriorityCategory){
            $lowerPriorityCategory->order++;
            $lowerPriorityCategory->saveQuietly();
        }
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $lowerPriorityCategories = Category::query()
            ->where('order','>',$category->order)
            ->get();
        foreach ($lowerPriorityCategories as $lowerPriorityCategory)
        {
            $lowerPriorityCategory->order--;
            $lowerPriorityCategory->saveQuietly();
        }
    }

}
