@extends('panel.layouts.app')
@section('title')
    Hizmet düzenle
@endsection
@section('page-title')
    <p class="text-center">Hizmet düzenle</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('service.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('service.update',$service)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="name" value="{{$service->name}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription">{{$service->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input type="file" name="image" class="form-control" id="inputImage">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option selected value="{{null}}">Durum seçiniz...</option>
                            <option value="1" @selected($service->status == 1)>Aktif</option>
                            <option value="0" @selected($service->status == 0)>Pasif</option>
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
