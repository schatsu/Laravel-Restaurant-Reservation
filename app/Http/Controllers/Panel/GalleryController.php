<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;


class GalleryController extends Controller
{

    public function reOrder(Request $request)
    {
        try {
            $orderData = json_decode($request->getContent(), true);

            foreach ($orderData as $data) {
                Gallery::where('id', $data['id'])->update(['order' => $data['order']]);
            }
            return response()->json(['success' => true]);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response('error',false);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $galleries = Gallery::query()->orderBy('order')->paginate(5);
        return view('panel.gallery.index',compact('galleries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('panel.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request) : RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('gallery',$imgName,'public');
                $validated['image'] = $imgPath;
            }
            Gallery::query()->create($validated);
            toast('Resim ekleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Resim ekleme sırasında bir hata oluştu','error');
            return redirect()->back();
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery) : View
    {
       return view('panel.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery) : RedirectResponse
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
            $gallery->update($validated);

            toast('Resim güncelleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Resim güncelleme sırasında bir hata oluştu','error');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery) : RedirectResponse
    {
        try {
            if (isset($gallery->image))
            {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->delete();
            toast('Resim silme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            toast('Resim silme işlemi sırasında bir hata meydana geldi','error');
            return  redirect()->back();
        }
    }
}
