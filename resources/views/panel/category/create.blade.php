@extends('panel.layouts.app')
@section('title')
    Kategori oluştr
@endsection
@section('page-title')
    <p class="text-center">Kategori oluştur </p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('category.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="name" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input type="file" name="image" class="form-control" id="inputImage">
                    </div>
                    <div class="col-md-6">
                        <label for="inputParent" class="form-label">Üst kategori</label>
                        <select name="parent_id" class="form-control" id="inputParent">
                            <option value="{{null}}">Kategori seçiniz..</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="{{null}}">Durum seçiniz..</option>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end"><i class="material-icons-outlined">add</i>Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
