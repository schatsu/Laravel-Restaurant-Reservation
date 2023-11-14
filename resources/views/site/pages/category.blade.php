@extends('site.layouts.app')
@section('title')
{{$category->name}}
@endsection
@section('content')
    <section data-bs-version="5.1" class="article4 cid-tTgWIgYbHf" id="article04-y">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2"><strong>{{$category->name}}</strong></h3>
            </div>
            @forelse($category->menu as $menu)
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-12 col-lg-6 image-wrapper">
                        <img class="w-100" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="text-wrapper align-left">
                            <h1 class="text-primary display-2">
                                <strong>{{ $menu->name }}</strong>
                            </h1>
                            <p class="text-success display-5">
                                <strong>{{ $menu->price }}₺</strong>
                            </p>
                            <p class="mbr-text mbr-fonts-style mb-4 display-7">
                                {{\Illuminate\Support\Str::limit($menu->description,100)}}
                            </p>
                            <div class="mbr-section-btn item-footer">
                                <a href="{{route('menu.detail',[$category,$menu])}}" class="btn item-btn btn-primary display-4 animate__animated animate__delay-1s animate__fadeInUp">Detay</a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-dark">
                    <h2 class="text-primary">Kategoriye ait ürün bulunamadı.</h2>
                </div>
            @endforelse
        </div>
    </section>
@endsection
