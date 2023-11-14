<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $comments = Comment::query()->latest()->paginate(5);
        return view('panel.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('panel.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request):RedirectResponse
    {
        try {
            $validated = $request->validated();
            Comment::query()->create($validated);
            toast('Yorum ekleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Yorum ekleme işlemi sırasında hata oldu','error');
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment):View
    {
        return \view('panel.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment):RedirectResponse
    {
        try {
            $validated = $request->validated();
            $comment->update($validated);
            toast('Yorum güncelleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Yorum güncelleme işlemi sırasında hata oldu','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        try {
            $comment->delete();
            toast('Yorum silme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Yorum silme işlemi sırasında hata olud','error');
            return redirect()->back();
        }
    }
}
