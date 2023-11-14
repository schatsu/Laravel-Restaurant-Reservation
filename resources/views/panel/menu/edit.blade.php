@extends('panel.layouts.app')
@section('title')
    Menü düzenle
@endsection
@section('page-title')
    <p class="text-center">Menü düzenle</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{route('menu.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
                </div>
                <div class="float-end">
                    <a data-fslightbox="gallery" href="{{asset('storage/'.$menu->image)}}">
                        <img src="{{asset('storage/'.$menu->image)}}" height="64" width="64" alt="{{$menu->name}}" class="rounded-circle">
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('menu.update',$menu)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad</label>
                        <input name="name" type="text" value="{{$menu->name}}" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Resim</label>
                        <input name="image" type="file" class="form-control" id="inputImage">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrice" class="form-label">Fiyat</label>
                        <input name="price" type="text" value="{{$menu->price}}" class="form-control" id="inputPrice" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="{{null}}">Durum seçiniz..</option>
                            <option value="1" @selected($menu->status==1)>Aktif</option>
                            <option value="0" @selected($menu->status==0)>Pasif</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputDescription" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputDescription">{{$menu->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCategory" class="form-label">Kategori</label>
                        <select name="category_id[]" id="inputCategory" class="form-select" multiple="multiple" style="height:64px">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @selected($menu->categories->contains($category->id))>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input name="is_featured" class="form-check-input" value="1" @checked($menu->is_featured == 1) type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Öne çıkarılsın mı?
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
@endsection
