@extends('panel.layouts.app')
@section('title')
    Hizmetler
@endsection
@section('page-title')
    <p class="text-center">Hizmetler</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{route('service.create')}}" class="btn btn-primary"><i class="material-icons-outlined">add</i>Ekle</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">RESİM</th>
                            <th scope="col">AD</th>
                            <th scope="col">AÇIKLAMA</th>
                            <th scope="col">DURUM</th>
                            <th scope="col">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>
                                    <a data-fslightbox="gallery" href="{{asset('storage/'.$service->image)}}">
                                        <img src="{{asset('storage/'.$service->image)}}" height="72" width="72" alt="{{$service->name}}" class="rounded-circle">
                                    </a>
                                </td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->description}}</td>
                                <td>
                                    @if($service->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('service.edit',$service)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                        <form action="{{route('service.destroy',$service)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center text-secondary">Şu anda gösterilecek hizmet yok</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
@endsection
