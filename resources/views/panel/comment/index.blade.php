@extends('panel.layouts.app')
@section('title')
    Yorumlar
@endsection
@section('page-title')
    <p class="text-center">Yorumlar</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('comment.create')}}" class="btn btn-primary"><i class="material-icons-outlined">add</i>Ekle</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">KULLANICI ADI</th>
                            <th scope="col">YORUM</th>
                            <th scope="col">PUAN</th>
                            <th scope="col">DURUM</th>
                            <th scope="col">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <th>{{$comment->id}}</th>
                                <td>{{$comment->user_name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->rating}}</td>
                                <td>
                                    @if($comment->status == true)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('comment.edit',$comment)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                        <form action="{{route('comment.destroy',$comment)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary">Şu anda mevcut bir yorum yok.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
