<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\AboutUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $aboutUs = AboutUs::query()->first();
        return view('panel.hakkımızda.index',compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, AboutUs $aboutUs) : RedirectResponse
    {
        try {
            $query = AboutUs::query()->first();
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('aboutUs',$imgName,'public');
                $validated['image'] = $imgPath;

                if (isset($aboutUs->image))
                {
                    Storage::disk('public')->delete($aboutUs->image);
                }
            }
            $query->update($validated);

            toast('Güncelleme işlemi başarılı.','success');

            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            toast('Güncelleme işlemi sırasında bir hata meydana geldi.');

            return redirect()->back();
        }
    }

}
