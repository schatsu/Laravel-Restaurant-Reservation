@extends('panel.layouts.app')
@section('title')
   Slider
@endsection
@section('page-title')
    <p class="text-center">Slider</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <a href="{{route('slider.create')}}" class="btn btn-primary"><i class="material-icons-outlined">add</i>Ekle</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SIRA</th>
                            <th scope="col">SLIDER</th>
                            <th scope="col">BAŞLIK</th>
                            <th scope="col">ALT BAŞLIK</th>
                            <th scope="col">DURUM</th>
                            <th scope="col">OLUŞTURULMA T.</th>
                            <th scope="col">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody id="sortable-table">
                        @forelse($sliders as $slider)
                            <tr data-id="{{ $slider->id }}">
                                <th>{{$slider->order}}</th>
                                <td>
                                    <a data-fslightbox="gallery" href="{{asset('storage/'.$slider->image)}}">
                                        <img src="{{asset('storage/'.$slider->image)}}" height="72" width="72" alt="{{$slider->title}}" class="rounded-circle">
                                    </a>
                                </td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->sub_title}}</td>
                                <td>@if($slider->status == true)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>{{$slider->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('slider.edit',$slider)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                        <form action="{{route('slider.destroy',$slider)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-secondary">Şu anda mevcut bir galeri yok.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$sliders->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        const sortableTable = document.getElementById('sortable-table');
        const url = '{{route('slider.reorder')}}';
        if (sortableTable){
            const sortable = new Sortable(sortableTable, {
                animation: 1000,
                onEnd: async (evt) => {
                    const rows = Array.from(sortableTable.querySelectorAll('tr'));
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
        }

    </script>
@endsection
