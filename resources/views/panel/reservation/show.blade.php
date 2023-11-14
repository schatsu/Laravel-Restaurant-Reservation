@extends('panel.layouts.app')
@section('title')
Rezervasyon detay
@endsection
@section('page-title')
<p class="text-center">Rezervasyon detay</p>
@endsection
@section('content')
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{route('reservation.index')}}" class="btn btn-primary"><i class="material-icons-outlined">arrow_back</i>Geri</a>
                </div>
               <div class="float-end">
                   <a href="{{route('reservation.edit',$reservation)}}" class="btn btn-warning"><i class="material-icons-outlined">edit</i>Düzenle</a>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-md-6">
                       <label for="inputName" class="form-label">Ad Soyad</label>
                       <input name="name" type="text" readonly class="form-control" value="{{$reservation->name}}" id="inputName">
                   </div>
                   <div class="col-md-6">
                       <label for="inputEmail" class="form-label">E-Posta</label>
                       <input name="email" type="email" readonly class="form-control" value="{{$reservation->email}}" id="inputEmail">
                   </div>
                   <div class="col-md-6">
                       <label for="inputPhone" class="form-label">Telefon</label>
                       <input name="phone" type="tel" readonly class="form-control" value="{{$reservation->phone}}" id="inputPhone">
                   </div>
                   <div class="col-md-6">
                       <label for="inputPerson" class="form-label">Kişi sayısı</label>
                       <input name="person" type="number" readonly class="form-control" value="{{$reservation->person}}" id="inputPerson">
                   </div>
                   <div class="col-md-6">
                       <label for="inputDate" class="form-label">Tarih</label>
                       <input name="date" type="date" readonly class="form-control" value="{{$reservation->date}}" id="inputDate">
                   </div>
                   <div class="col-md-6">
                       <label for="inputTime" class="form-label">Saat</label>
                       <input name="time" type="time" readonly class="form-control" value="{{$reservation->time}}" id="inputTime">
                   </div>
                   <div class="col-md-6">
                       <label for="inputStatus" class="form-label">Durum</label>
                       <input name="stauts" type="text" readonly class="form-control" value="{{$reservation->status == 1 ? 'Tamamlandı' : 'Bekliyor'}}" id="inputTime">
                   </div>
                   <div class="col-md-6">
                       <label for="inputMessage" class="form-label">Mesaj</label>
                       <textarea name="message" readonly id="inputMessage" class="form-control">{{$reservation->message}}</textarea>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
