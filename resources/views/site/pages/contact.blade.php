@extends('site.layouts.app')
@section('title')
İletişim
@endsection
@section('content')
    <section data-bs-version="5.1" class="form5 cid-tT8UuTEAVj" id="form02-u">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>Iletisim formu</strong>
                </h3>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form action="{{route('contactForm.post')}}" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                        @csrf
                        <div class="dragArea row">
                            <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                                <input type="text" name="name" placeholder="Ad Soyad" data-form-field="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="col-md col-sm-12 form-group mb-3" data-for="phone">
                                <input type="text" name="phone" placeholder="Telefon" data-form-field="phone" class="form-control" value="{{old('phone')}}">
                            </div>

                            <div class="col-12 form-group mb-3" data-for="textarea">
                                <textarea name="message" placeholder="Mesajınız" data-form-field="textarea" class="form-control">{{old('message')}}</textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button type="submit" class="btn btn-primary display-7">Gönder</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="contacts01 cid-tT8UUkawYD" id="contacts01-w">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Iletisim</strong></h3>
            </div>
            <div class="row">
                <div class="item features-without-image col-12 col-md-6 active">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Telefon</strong></h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <a href="tel:{{isset($settings) ? $settings->phone : ''}}" class="text-black">{{isset($settings) ? $settings->phone : ''}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>E-Posta</strong></h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <a href="mailto:{{isset($settings) ? $settings->email : ''}}" class="text-black">{{isset($settings) ? $settings->email : ''}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Adres</strong></h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                {{isset($settings) ? $settings->address : ''}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Çalısma Saatleri</strong></h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                               {{isset($settings) ? $settings->working_hours : ''}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="map1 cid-tT8ULga4HJ" id="map01-v">
        <div class="container">
            <div class="mbr-section-head mb-5">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Adresimiz</strong></h3>
            </div>
            <div class="google-map">
                {!! isset($settings) ? $settings->google_maps : '' !!}
            </div>
        </div>
    </section>
@endsection
