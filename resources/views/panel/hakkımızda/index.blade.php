@extends('panel.layouts.app')
@section('title')
    Hakkımızda
@endsection
@section('style')
    <link href="{{asset('panel/assets/plugins/summernote/summernote-lite.min.css')}}" rel="stylesheet">
@endsection
@section('page-title')
    <p class="text-center">Hakkımızda</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    <a data-fslightbox="gallery" href="{{asset('storage/'.$aboutUs->image)}}">
                        <img src="{{asset('storage/'.$aboutUs->image)}}" height="64" width="64" alt="{{$aboutUs->title}}" class="rounded-circle">
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{isset($aboutUs) ? route('about-us.update',$aboutUs) : ''}}" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputTitle" class="form-label">Başlık</label>
                        <input type="text" value="{{isset($aboutUs) ? $aboutUs->title : ''}}" class="form-control" name="title" id="inputTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="inputFile" class="form-label">Resim</label>
                        <input type="file" name="image" class="form-control" id="inputFile">
                    </div>
                    <div class="col-md-12">
                        <label for="summernote" class="form-label">İçerik</label>
                        <textarea id="summernote" name="content">{{isset($aboutUs) ? $aboutUs->content : ''}}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning"><i class="material-icons-outlined">done</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/summernote/summernote-lite.min.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/text-editor.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
@endsection
