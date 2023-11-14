@extends('site.layouts.app')
@section('title')
    Menüler
@endsection
@section('content')
    <section data-bs-version="5.1" class="gallery1 mbr-gallery cid-tTyz6A38SZ" id="gallery01-11">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2"><strong>Kategoriler</strong></h3>
            </div>
                <div class="row mbr-gallery mt-4">
                    @forelse( $categories as $category)
                    <div class="col-12 col-md-6 col-lg-4 item gallery-image">
                        <a href="{{route('menu.category',$category)}}" class="text-primary">
                            <div class="item-wrapper mb-3">
                                <img class="w-100" src="{{asset('storage/'.$category->image)}}" loading="lazy" alt="{{$category->name}}">
                            </div>
                            <h6 class="mbr-item-subtitle mbr-fonts-style align-center mb-0 mt-3 display-7">
                                {{$category->name}}
                            </h6>
                        </a>
                    </div>
                    @empty
                        <div class="alert alert-dark">
                            <h2 class="text-primary">Şuan da mevcut bir kategori yok.</h2>
                        </div>
                    @endforelse
                </div>
        </div>
    </section>
@endsection
