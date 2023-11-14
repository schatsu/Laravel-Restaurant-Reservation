@extends('panel.layouts.app')
@section('title')
    Kategori düzenle
@endsection
@section('page-title')
    <p class="text-center">Kategori düzenle</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('category.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('category.update',$category)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input type="file" name="image" class="form-control" id="inputImage">
                    </div>
                    <div class="col-md-6">
                        <label for="inputParent" class="form-label">Üst kategori</label>
                        <select name="parent_id" class="form-control" id="inputParent">
                            <option value="{{null}}">Kategori seçiniz..</option>
                            @if($category->parent)
                                @foreach([$category->parent] as $cat)
                                    <option value="{{$cat->id}}" {{$cat->name ? 'selected' : ''}}>{{$cat->name}}</option>
                                @endforeach
                            @else
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="{{null}}">Durum seçiniz..</option>
                            <option value="1" @selected($category->status ==1)>Aktif</option>
                            <option value="0" @selected($category->status ==0)>Pasif</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription">{{$category->description}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
