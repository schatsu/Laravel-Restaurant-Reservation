@extends('panel.layouts.app')
@section('title')
    Rezervasyonlar
@endsection
@section('page-title')
    <p class="text-center">Rezervasyonlar</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get" class="row g-3">
                   <div class="col-xl-3">
                       <input type="search" name="search" placeholder="Tabloda ara.." value="{{request()->get('search')}}" class="form-control">
                   </div>
                    <div class="col-xl-2">
                        <button type="submit" class="btn btn-warning mt-1"><i class="material-icons-outlined">search</i>Ara</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">AD SOYAD</th>
                            <th scope="col">E-POSTA</th>
                            <th scope="col">TELEFON</th>
                            <th scope="col">KİŞİ SAYISI</th>
                            <th scope="col">TARİH</th>
                            <th scope="col">SAAT</th>
                            <th scope="col">DURUM</th>
                            <th scope="col">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->name}}</td>
                                <td>{{$reservation->email}}</td>
                                <td>{{$reservation->phone}}</td>
                                <td>{{$reservation->person}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($reservation->date)->translatedFormat("d F Y")}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($reservation->time)->format('H:i')}}</td>
                                <td>
                                    @if($reservation->status == 1)
                                        <span class="badge badge-success">tamamlandı</span>
                                    @else
                                        <span class="badge badge-warning">Bekliyor</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('reservation.show',$reservation)}}" type="button" class="btn btn-warning btn-burger"><i class="material-icons">visibility</i></a>
                                        <a href="{{route('reservation.edit',$reservation)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                        <form action="{{route('reservation.destroy',$reservation)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="9" class="text-center text-secondary">Şu anda gösterilecek rezervasyon yok</td>
                        @endforelse
                        </tbody>
                    </table>
                    {{$reservations->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
