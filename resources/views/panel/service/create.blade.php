@extends('panel.layouts.app')
@section('title')
    Hizmet oluştur
@endsection
@section('page-title')
    <p class="text-center">Hizmet oluştur</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('service.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription">{{old('description')}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input type="file" name="image" class="form-control" id="inputImage" value="{{old('image')}}">
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
