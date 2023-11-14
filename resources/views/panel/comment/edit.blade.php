@extends('panel.layouts.app')
@section('title')
    Yorum düzenle
@endsection
@section('page-title')
    <p class="text-center">Yorum düzenle</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('comment.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('comment.update',$comment)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="user_name" value="{{$comment->user_name}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputComment" class="form-label">Yorum</label>
                        <textarea name="comment" class="form-control" id="inputComment">{{$comment->comment}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputRating" class="form-label">Puan</label>
                        <input type="number" name="rating" class="form-control" value="{{$comment->rating}}" min="1" max="5" id="inputRating">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option selected value="{{null}}">Durum seçiniz...</option>
                            <option value="1" @selected($comment->status == 1)>Aktif</option>
                            <option value="0" @selected($comment->status == 0)>Pasif</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
