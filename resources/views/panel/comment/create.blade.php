@extends('panel.layouts.app')
@section('title')
    Yorum oluştur
@endsection
@section('page-title')
    <p class="text-center">Yorum oluştur</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('comment.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('comment.store')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputComment" class="form-label">Yorum</label>
                        <textarea name="comment" class="form-control" id="inputComment">{{old('comment')}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputRating" class="form-label">Puan</label>
                        <input type="number" name="rating" class="form-control" value="{{old('rating')}}" min="1" max="5" id="inputRating">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option selected value="{{null}}">Durum seçiniz...</option>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end"><i class="material-icons-outlined">add</i>Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
