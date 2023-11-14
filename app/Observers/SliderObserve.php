<?php

namespace App\Observers;

use App\Models\Slider;

class SliderObserve
{
    /**
     * Handle the Slider "created" event.
     */
    public function creating(Slider $slider): void
    {
        if (is_null($slider->order)){
            $slider->order = Slider::query()->max('order') + 1;
            return;
        }

        $lowerPrioritySliders = Slider::query()->where('order','>=',$slider->order)
            ->get();
        foreach ($lowerPrioritySliders as $lowerPrioritySlider){
            $lowerPrioritySlider->order++;
            $lowerPrioritySlider->saveQuietly();
        }


    }


    /**
     * Handle the Slider "deleted" event.
     */
    public function deleted(Slider $slider): void
    {
        $lowerPrioritySliders = Slider::query()->where('order','>',$slider->order)
            ->get();

        foreach ($lowerPrioritySliders as $lowerPrioritySlider){
            $lowerPrioritySlider->order--;
            $lowerPrioritySlider->saveQuietly();
        }
    }

}
