@extends('site.layouts.app')
@section('meta')
<meta name="keywords" content="{{isset($settings)?$settings->seo_keywords_home: ''}}">
<meta name="description" content="{{isset($settings)?$settings->seo_description_home:''}}">
@endsection
@section('title')
    Anasayfa
@endsection
@section('style')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
@endsection
@section('content')
{{--slider--}}
    <section data-bs-version="5.1" class="slider3 cid-tT596WPckQ" id="slider03-1">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                @isset($sliders)
                    @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                            <img src="{{ asset('storage/' . $slider->image) ?? asset('site/assets/images/slider.jpg') }}"
                                 loading="lazy" class="img-fluid d-block w-100" alt="{{$slider->title}}">
                            <div class="carousel-caption">
                                <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-1">
                                    <strong>{{ $slider->title }}</strong>
                                </h5>
                                <p class="mbr-section-text mbr-fonts-style mb-4 display-2">{{ $slider->sub_title }}</p>
                                <div class="mbr-section-btn mb-5"><a class="btn btn-primary display-7" href="{{route('reservation')}}">Rezervasyon</a></div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @empty($sliders)
                    <div class="carousel-item active">
                        <img src="{{ asset('site/assets/images/slider.jpg') }}" loading="lazy" class="img-fluid d-block w-100" alt="default slider">
                    </div>
                @endempty
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
{{--futures--}}
    <section data-bs-version="5.1" class="clients2 cid-tT59teMDbf" id="clients2-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="item features-without-image mb-5 col-12 col-md-4 active">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <img class="w-100" src="{{asset('site/assets/images/5.jpg')}}" alt="menu" loading="lazy" data-slide-to="0" data-bs-slide-to="0">
                        </div>
                        <div class="card-box align-center">
                            <h5 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Lezzetli Menü</strong></h5>
                            <p class="mbr-text mbr-fonts-style mb-4 display-7">
                                Lorem ipsum dol consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua
                            </p>
                        </div>
                    </div>
                </div><div class="item features-without-image mb-5 col-12 col-md-4">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <img class="w-100" src="{{asset('site/assets/images/3.jpg')}}" alt="organic" loading="lazy" data-slide-to="1" data-bs-slide-to="1">
                        </div>
                        <div class="card-box align-center">
                            <h5 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Organik Ürünler</strong></h5>
                            <p class="mbr-text mbr-fonts-style mb-4 display-7">
                                Lorem ipsum dol consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua
                            </p>
                        </div>
                    </div>
                </div><div class="item features-without-image mb-5 col-12 col-md-4">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <img class="w-100" src="{{asset('site/assets/images/2.jpg')}}" alt="Dessert" loading="lazy" data-slide-to="2" data-bs-slide-to="3">
                        </div>
                        <div class="card-box align-center">
                            <h5 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Günlük Tatlılar</strong></h5>
                            <p class="mbr-text mbr-fonts-style mb-4 display-7">
                                Lorem ipsum dol consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--about-us--}}
    <section data-bs-version="5.1" class="article4 cid-tT5fxRRc3d" id="article04-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-6 image-wrapper">
                    <img class="w-100" src="{{isset($aboutUs) ? asset('storage/'.$aboutUs->image) : asset('site/assets/images/about.jpg')}}" alt="{{isset($aboutUs) ? $aboutUs->title: 'about-us'}}">
                </div>
                <div class="col-12 col-md-12 col-lg">
                    <div class="text-wrapper align-left">
                        <h1 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                            <strong>{{isset($aboutUs) ? $aboutUs->title : 'Hakkımızda'}}</strong></h1>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            {{isset($aboutUs) ? $aboutUs->content : ''}}
                        </p>
                        <div class="mbr-section-btn mt-3">
                            <a class="btn btn-lg btn-primary display-4" href="{{route('about-us')}}">Devamı...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--featured meals--}}
    <section data-bs-version="5.1" class="features4 cid-tT5gU1bMsb" id="features04-7">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h4 class="mbr-section-title mbr-fonts-style align-left mb-0 display-2">
                    <strong>Öne çıkan lezzetlerimiz</strong>
                </h4>
            </div>
            <div class="row">
                @foreach($isFeatured as $featured)
                    <div class="item features-image col-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <img class="w-100" src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->name }}">
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-5">
                                    <strong>{{ $featured->name }}</strong>
                                </h5>
                                <h6 class="item-subtitle mbr-fonts-style display-7">
                                    {{ $featured->price }}₺
                                </h6>
                                <p class="mbr-text mbr-fonts-style display-7">
                                    {{ \Illuminate\Support\Str::limit($featured->description, 75) }}
                                </p>
                                <div class="mbr-section-btn item-footer">
                                    <a href="{{ route('menu.detail', [$featured->categories->first(), $featured]) }}" class="btn item-btn btn-primary display-4">Detay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                <img class="w-100" loading="lazy" src="{{asset('storage/'.$gallery->image)}}" alt="{{$gallery->title}}" >
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
{{--comment--}}
    <section data-bs-version="5.1" class="people2 cid-tT5siYvMvY" id="people02-a">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                        <strong>Yorumlar</strong></h3>
                </div>
            </div>
            <div class="row">
                @foreach($comments as $comment)
                    <div class="item features-without-image col-12 col-md-6 col-lg-3 mb-5">
                        <div class="item-wrapper">
                            <div class="card-box align-center">
                                <div class="iconfont-wrapper mb-3">
                                    @for ($i = 1; $i <= $comment->rating; $i++)
                                        <span class="mbr-iconfont socicon-reverbnation socicon" style="color: rgb(255, 166, 0); fill: rgb(255, 166, 0);"></span>
                                    @endfor
                                </div>
                                <h5 class="card-title mbr-fonts-style mb-3 display-7">
                                   {{$comment->comment}}
                                </h5>
                                <p class="card-text mbr-fonts-style mb-0 display-7">
                                    {{$comment->user_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
{{--map--}}
    <section data-bs-version="5.1" class="map1 cid-tT5tPEpmAz" id="map01-b">

        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>Adresimiz</strong>
                </h3>
            </div>
            <div class="google-map">
                {!! isset($settings) ? $settings->google_maps : '' !!}
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
