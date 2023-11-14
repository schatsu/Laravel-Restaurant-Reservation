@extends('site.layouts.app')
@section('title')
Hizmetlerimiz
@endsection
@section('content')
    <section data-bs-version="5.1" class="features6 cid-tT8MfUNmTW" id="features06-m">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Hizmetlerimiz</strong></h4>
            </div>
            <div class="row mt-4">
                @forelse($services as $service)
                    <div class="item features-image col-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <img src="{{isset($service) ? asset('storage/'.$service->image): ''}}" alt="{{$service->name}}">
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-5"><strong>{{$service->name}}</strong></h5>
                                <p class="mbr-text mbr-fonts-style mt-2 display-7">
                                  {{$service->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-dark">
                        <h2 class="text-primary">Şuan da mevcut bir hizmet yok.</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
