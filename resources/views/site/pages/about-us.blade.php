@extends('site.layouts.app')
@section('title')
    Hakkımızda
@endsection
@section('style')
 <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
 <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
 />
@endsection
@section('content')
{{--about-us--}}
    <section data-bs-version="5.1" class="article4 cid-tTgWIgYbHf" id="article04-y">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-6 image-wrapper">
                    <img class="w-100" src="{{asset('storage/'.$aboutUs->image)}}" alt="{{$aboutUs->title}}">
                </div>
                <div class="col-12 col-md-12 col-lg">
                    <div class="text-wrapper align-left">
                        <h1 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                            <strong>{{$aboutUs->title}}</strong>
                        </h1>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            {{$aboutUs->content}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--gallery--}}
    <section data-bs-version="5.1" class="gallery1 mbr-gallery cid-tT5jMxUi5P" id="gallery01-8">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2"><strong>Galeri</strong></h3>
            </div>
            <div class="row mbr-gallery mt-4">
                @foreach($galleries as $gallery)
                    <div class="col-12 col-md-6 col-lg-4 item gallery-image">
                        <div class="item-wrapper mb-3" >
                            <a href="{{asset('storage/'.$gallery->image)}}" data-fancybox="gallery" data-caption="{{$gallery->title}}">
                                <img class="w-100" src="{{asset('storage/'.$gallery->image)}}" alt="{{$gallery->title}}" >
                            </a>
                            <div class="icon-wrapper">
                                <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            Escape: "close",
            Delete: "close",
            Backspace: "close",
            PageUp: "next",
            PageDown: "prev",
            ArrowUp: "prev",
            ArrowDown: "next",
            ArrowRight: "next",
            ArrowLeft: "prev",
        });
    </script>
@endsection
