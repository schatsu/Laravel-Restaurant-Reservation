@extends('panel.layouts.app')
@section('title')
    Menü oluştur
@endsection
@section('page-title')
    <p class="text-center">Menü oluştur</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input name="name" type="text" value="{{old('name')}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input name="image" type="file" class="form-control" id="inputImage">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrice" class="form-label">Fiyat</label>
                        <input name="price" type="text" value="{{old('price')}}" class="form-control" id="inputPrice" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="{{null}}">Durum seçiniz..</option>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription">{{old('description')}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCategory" class="form-label">Kategori</label>
                        <select name="category_id[]" id="inputCategory" class="form-select" multiple="multiple" style="height:64px">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input name="is_featured" class="form-check-input" value="1"  type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Öne çıkarılsın mı?
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end"><i class="material-icons-outlined">add</i>Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
