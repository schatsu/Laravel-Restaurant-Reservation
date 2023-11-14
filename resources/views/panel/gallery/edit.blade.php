@extends('panel.layouts.app')
@section('title')
    Galeri düzenle
@endsection
@section('page-title')
    <p class="text-center">Galeri düzenle</p>
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Hata...',
                    text: '{{$error}}',
                })
            </script>
        @endforeach
    @endif
    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{route('gallery.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
                </div>
                <div class="float-end">
                    <a data-fslightbox="gallery" href="{{asset('storage/'.$gallery->image)}}">
                        <img src="{{asset('storage/'.$gallery->image)}}" height="64" width="64" alt="{{$gallery->title}}" class="rounded-circle">
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('gallery.update',$gallery)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputTitle" class="form-label">Başlık</label>
                        <input type="text" name="title" value="{{$gallery->title}}" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSubTitle" class="form-label">Açıklama</label>
                        <textarea name="description" class="form-control" id="inputSubTitle">{{$gallery->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSlider" class="form-label">Resim<span class="text-danger">*</span></label>
                        <input type="file" name="image"  class="form-control" id="inputSlider">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum<span class="text-danger">*</span></label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="1" @selected($gallery->status == 1)>Aktif</option>
                            <option value="0" @selected($gallery->status == 0)>Pasif</option>
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
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
@endsection
