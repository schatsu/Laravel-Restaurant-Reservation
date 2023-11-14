@extends('panel.layouts.app')
@section('title')
İletişim formu detay
@endsection
@section('page-title')
<p class="text-center">İletişim formu detay</p>
@endsection
@section('content')
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <a href="{{route('contact.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Ad Soyad</label>
                    <input type="text" readonly class="form-control" id="inputName" value="{{$contactForm->name}}">
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label">Ad Soyad</label>
                    <input type="text" readonly class="form-control" id="inputPhone" value="{{$contactForm->phone}}">
                </div>
                <div class="col-md-6">
                    <label for="inputMessage" class="form-label">Mesaj</label>
                    <textarea class="form-control" readonly id="inputMessage">{{$contactForm->message}}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputTime" class="form-label">G.Tarihi</label>
                    <input type="text" readonly class="form-control" value="{{\Carbon\Carbon::parse($contactForm->created_at)->translatedFormat('D Y F')}}" id="inputTime">
                </div>
            </div>
        </div>
    </div>
@endsection
