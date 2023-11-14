<?php

namespace App\Observers;

use App\Models\Gallery;

class GalleryObserve
{
    /**
     * Handle the Gallery "created" event.
     */
    public function creating(Gallery $gallery): void
    {
        if (is_null($gallery->order)) {
            $gallery->order = Gallery::max('order') + 1;
            return;
        }
        $lowerPriorityGalleries = Gallery::where('order', '>=', $gallery->order)
            ->get();
        foreach ($lowerPriorityGalleries as $lowerPriorityGallery) {
            $lowerPriorityGallery->order++;
            $lowerPriorityGallery->saveQuietly();
        }
    }

    /**
     * Handle the Gallery "deleted" event.
     */
    public function deleted(Gallery $gallery): void
    {
        $lowerPriorityGalleries = Gallery::where('order', '>', $gallery->order)
            ->get();

        foreach ($lowerPriorityGalleries as $lowerPriorityGallery) {
            $lowerPriorityGallery->order--;
            $lowerPriorityGallery->saveQuietly();
        }

    }

}
