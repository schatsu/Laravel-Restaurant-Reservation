<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $menus = Menu::query()->with('categories')->paginate(10);
        return view('panel.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        $categories = Category::all(['id','name']);
        return \view('panel.menu.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request) : RedirectResponse
    {
        try {
            $validated = $request->validated();
            $menu = Menu::query()->create($validated);
            $menu->categories()->attach($request->category_id);
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('menu',$imgName,'public');
                $menu->image = $imgPath;
            }
            $menu->save();
            toast('Ürün menüye başarıyla eklendi','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Ürün menüye eklenirken bir hata oluştu.','error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu): View
    {   $categories = Category::all(['id','name']);
        return \view('panel.menu.edit',compact(['menu','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu):RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('menu',$imgName,'public');
                $validated['image'] = $imgPath;
                if (isset($menu->image))
                {
                    Storage::disk('public')->delete($menu->image);
                }
            }
            $menu->categories()->sync($request->category_id);
            $menu->update($validated);
            toast('Ürün güncelleme işlemi başarılı','success');
            return to_route('menu.index');
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Ürün güncelleme işlemi sırasında bir hata oldu','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu):RedirectResponse
    {
        try {
            if (isset($menu->image))
            {
                Storage::disk('public')->delete($menu->image);
            }
            $menu->categories()->detach();
            $menu->delete();
            toast('Ürün silme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Ürün silme işlemi sırasında hata oldu.','error');
            return redirect()->back();
        }
    }
}
