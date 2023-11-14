<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SliderController extends Controller
{

    public function reOrder(Request $request)
    {
        try {
            $orderData = json_decode($request->getContent(), true);

            foreach ($orderData as $data) {
                Slider::query()->where('id', $data['id'])->update(['order' => $data['order']]);
            }
            return response()->json(['success' => true]);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return  response()->json('error',false);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $sliders = Slider::query()->orderBy('order')->paginate(3);

        return view('panel.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('panel.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request) : RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('slider',$imgName,'public');
                $validated['image'] = $imgPath;
            }
            toast('Slider ekleme işlemi başarılı','success');
            Slider::query()->create($validated);

            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Slider ekleme işlemi sırasında bir hata oluştu','error');
            return redirect()->back();
        }

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider) : View
    {
        return view('panel.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider) : RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('slider',$imgName,'public');
                $validated['image'] = $imgPath;

                if (isset($slider->image))
                {
                    Storage::disk('public')->delete($slider->image);
                }
            }

            $slider->update($validated);
            toast('Slider güncelleme işlemi başarılı.','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Slider güncelleme işlemi sırasında bir hata oldu.','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider) : RedirectResponse
    {
        try {
            if (isset($slider->image))
            {
                Storage::disk('public')->delete($slider->image);
            }

            $slider->delete();
            toast('Slider silme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Slider silme işlemi sırasında bir hata oldu','error');
            return redirect()->back();
        }
    }
}
