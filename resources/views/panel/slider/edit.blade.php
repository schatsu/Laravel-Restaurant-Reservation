@extends('panel.layouts.app')
@section('title')
    Slider düzenle
@endsection
@section('page-title')
    <p class="text-center">Slider düzenle</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    <a href="{{route('slider.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputTitle" class="form-label">Başlık</label>
                        <input type="text" name="title" class="form-control" id="inputTitle" value="{{$slider->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSubTitle" class="form-label">Alt Başlık</label>
                        <input type="text" name="sub_title" class="form-control" id="inputSubTitle" value="{{$slider->sub_title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSlider" class="form-label">Slider</label>
                        <input type="file" name="image" class="form-control" id="inputSlider">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Durum</label>
                        <select name="status" id="inputState" class="form-select">
                            <option selected>Durum...</option>
                            <option value="1" @selected($slider->status == 1)>Aktif</option>
                            <option value="0" @selected($slider->status == 0)>Pasif</option>
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
