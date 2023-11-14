@extends('panel.layouts.app')
@section('title')
    Kategoriler
@endsection
@section('page-title')
    <p class="text-center">Kategoriler</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="material-icons-outlined">add</i>Ekle</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="sortable-table">
                        <thead>
                        <tr>
                            <th scope="col">SIRA</th>
                            <th scope="col">RESİM</th>
                            <th scope="col">AD</th>
                            <th scope="col">SLUG</th>
                            <th scope="col">AÇIKLAMA</th>
                            <th scope="col">ÜST KATEGORİ</th>
                            <th scope="col">DURUM</th>
                            <th scope="col">OLUŞTURULMA T.</th>
                            <th scope="col">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody id="sortable-table">
                        @forelse($categories as $category)
                        <tr data-id = "{{$category->id}}">
                            <th>{{$category->order}}</th>
                            <td>
                                <a data-fslightbox="gallery" href="{{asset('storage/'.$category->image)}}">
                                    <img src="{{asset('storage/'.$category->image)}}" height="72" width="72" alt="{{$category->title}}" class="rounded-circle">
                                </a>
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                @if(isset($category->parent))
                                    <span class="badge badge-info">{{$category->parent->name}}</span>
                                @else
                                    <span class="badge badge-danger">yok</span>
                                @endif
                            </td>
                            <td>@if($category->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Pasif</span>
                                 @endif
                            </td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('category.edit',$category)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                    <form action="{{route('category.destroy',$category)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-secondary">Şu anda mevcut bir kategori yok.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
{{--  reorder  --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        const sortableTable = document.getElementById('sortable-table');
        const url = '{{route('category.reorder')}}';

        const sortable = new Sortable(sortableTable.querySelector('tbody'), {
            animation: 1000,
            onEnd: async (evt) => {
                const rows = Array.from(sortableTable.querySelectorAll('tbody tr'));
                const orderData = rows.map((row, index) => {
                    return {
                        id: row.getAttribute('data-id'),
                        order: index + 1,
                    };
                });

                await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(orderData),
                });
            }
        });
    </script>
@endsection
