<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $services = Service::query()->latest()->paginate(5);
        return view('panel.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('panel.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request):RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('service',$imgName,'public');
                $validated['image'] = $imgPath;
            }
          Service::query()->create($validated);
            toast('Hizmet ekleme işlemi başarılı','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Hizmet ekleme işlemi sırasında hata oldu','error');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service):View
    {
        return \view('panel.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service):RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('service',$imgName,'public');
                $validated['image'] = $imgPath;

                if (isset($service->image))
                {
                    Storage::disk('public')->delete($service->image);
                }
            }
            $service->update($validated);
            toast('Hizmet güncelleme işlemi başarılı.','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Hizmet güncelleme işlemi sırasında hata oldu.','error');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service):RedirectResponse
    {
        try {
            if (isset($service->image))
            {
                Storage::disk('public')->delete($service->image);
            }
            $service->delete();
            toast('Hizmet silme işlemi başarılı','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Hizmet silme işlemi sırasında hata oldu','error');
            return back();
        }
    }
}
