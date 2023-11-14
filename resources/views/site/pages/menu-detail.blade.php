@extends('site.layouts.app')
@section('title')
{{$menu->name}}
@endsection
@section('content')
    <section data-bs-version="5.1" class="article4 cid-tTgWIgYbHf" id="article04-y">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-6 image-wrapper">
                    <img class="w-100" src="{{asset('storage/'.$menu->image)}}" alt="{{$menu->title}}">
                </div>
                <div class="col-12 col-md-12 col-lg">
                    <div class="text-wrapper align-left">
                        <h1 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                            <strong>{{$menu->name}}</strong>
                        </h1>
                        <p class="text-success display-6">
                            <strong>{{ $menu->price }}₺</strong>
                        </p>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                           {{$menu->description}}
                        </p>
                        <div class="mbr-section-btn item-footer">
                            <a href="{{route('menu.category',$category)}}" class="btn item-btn btn-primary display-4 animate__animated animate__delay-1s animate__fadeInUp">Geri dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
