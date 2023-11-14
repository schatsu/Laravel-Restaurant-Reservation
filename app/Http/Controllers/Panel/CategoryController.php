<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function reOrder(Request $request)
    {
        try {
            $orderData = json_decode($request->getContent(), true);

            foreach ($orderData as $data) {
                Category::query()->where('id', $data['id'])->update(['order' => $data['order']]);
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
        $categories = Category::query()->with('parent')->orderBy('order')->paginate(10);
        return \view('panel.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::query()->with('parent','children')->get();
        return \view('panel.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('category',$imgName,'public');
                $validated['image'] = $imgPath;
            }
            Category::query()->create($validated);
            toast('Kategori oluşturma işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Kategori oluşturma sırasında bir hata oldu','error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View
    {
        $categories = Category::all();
       return \view('panel.category.edit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) :RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('category',$imgName,'public');
                $validated['image'] = $imgPath;

                if (isset($category->image))
                {
                    Storage::disk('public')->delete($category->image);
                }
            }

            $category->update($validated);
            toast('Kategori güncelleme işlemi başarılı.','success');
            return to_route('category.index');
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Kategori güncelleme işlemi sırasında hata oldu.','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        try {
            if (isset($category->image))
            {
                Storage::disk('public')->delete($category->image);
            }
            $category->delete();
            toast('Kategori başarıyla silindi','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Kategori silme işlemi sırasında hata oldu','error');
            return  redirect()->back();
        }
    }
}
