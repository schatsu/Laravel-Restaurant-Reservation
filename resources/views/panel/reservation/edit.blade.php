@extends('panel.layouts.app')
@section('title')
Rezervasyon düzenleme
@endsection
@section('page-title')
<p class="text-center">Rezervasyon düzenleme</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('reservation.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('reservation.update',$reservation)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Ad Soyad</label>
                        <input name="name" type="text" class="form-control" value="{{$reservation->name}}" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">E-Posta</label>
                        <input name="email" type="email" class="form-control" value="{{$reservation->email}}" id="inputEmail">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Telefon</label>
                        <input name="phone" type="tel" class="form-control" value="{{$reservation->phone}}" id="inputPhone">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPerson" class="form-label">Kişi sayısı</label>
                        <input name="person" type="number" class="form-control" value="{{$reservation->person}}" id="inputPerson">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDate" class="form-label">Tarih</label>
                        <input name="date" type="date" class="form-control" value="{{$reservation->date}}" id="inputDate">
                    </div>
                    <div class="col-md-6">
                        <label for="inputTime" class="form-label">Saat</label>
                        <input name="time" type="time" class="form-control" value="{{$reservation->time}}" id="inputTime">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">Durum</label>
                        <select name="status" id="inputStatus" class="form-select">
                            <option value="1" @selected($reservation->status==1)>Tamamlandı</option>
                            <option value="0" @selected($reservation->status==0)>Bekliyor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputMessage" class="form-label">Mesaj</label>
                        <textarea name="message" id="inputMessage" class="form-control">{{$reservation->message}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
