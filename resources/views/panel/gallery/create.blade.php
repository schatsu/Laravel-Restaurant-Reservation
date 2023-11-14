@extends('panel.layouts.app')
@section('title')
    Galeri oluştur
@endsection
@section('page-title')
    <p class="text-center">Galeri oluştur</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    <a href="{{route('gallery.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputTitle" class="form-label">Başlık</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSubTitle" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputSubTitle">{{old('description')}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSlider" class="form-label">Resim<span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control" id="inputSlider">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum<span class="text-danger">*</span></label>
                        <select name="status" id="inputStatus" class="form-select">
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

