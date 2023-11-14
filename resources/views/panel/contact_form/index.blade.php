@extends('panel.layouts.app')
@section('title')
İletişim Formu
@endsection
@section('page-title')
 <p class="text-center">İletişim formu</p>
@endsection
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Ad Soyad</th>
                          <th scope="col">Telefon</th>
                          <th scope="col">Mesaj</th>
                          <th scope="col">G.Tarihi</th>
                          <th scope="col">İşlemler</th>
                      </tr>
                   </thead>
                   <tbody>
                   @foreach($contacts as $contact)
                       <tr>
                           <td>{{$contact->id}}</td>
                           <td>{{$contact->name}}</td>
                           <td>{{$contact->phone}}</td>
                           <td>{{$contact->message}}</td>
                           <td>{{\Carbon\Carbon::parse($contact->created_at)->translatedFormat('D Y F')}}</td>
                           <td>
                               <div class="d-flex">
                                   <a href="{{route('contact.show',$contact)}}" class="btn btn-warning btn btn-burger"><i class="material-icons-outlined">visibility</i></a>
                                   <form action="{{route('contact.destroy',$contact)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons-outlined">delete</i></button>
                                   </form>
                               </div>
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
