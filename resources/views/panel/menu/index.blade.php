@extends('panel.layouts.app')
@section('title')
    Menü
@endsection
@section('page-title')
    <p class="text-center">Menü</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{route('menu.create')}}" class="btn btn-primary"><i class="material-icons-outlined">add</i>Ekle</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">RESİM</th>
                          <th scope="col">AD</th>
                          <th scope="col">SLUG</th>
                          <th scope="col">AÇIKLAMA</th>
                          <th scope="col">FİYAT</th>
                          <th scope="col">KATEGORİ</th>
                          <th scope="col">DURUM</th>
                          <th scope="col">ÖNE ÇIKARILSIN MI?</th>
                          <th scope="col">İŞLEMLER</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse($menus as $menu)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                              <a data-fslightbox="gallery" href="{{asset('storage/'.$menu->image)}}">
                                  <img src="{{asset('storage/'.$menu->image)}}" height="72" width="72" alt="{{$menu->name}}" class="rounded-circle">
                              </a>
                          </td>
                          <td>{{$menu->name}}</td>
                          <td>{{$menu->slug}}</td>
                          <td>{{\Illuminate\Support\Str::limit($menu->description,30)}}</td>
                          <td>{{$menu->price}}₺</td>
                          <td>
                              @foreach($menu->categories as $category)
                                  <span class="badge badge-info">{{$category->name}}</span>
                              @endforeach
                          </td>
                          <td>
                              @if($menu->status == true)
                                  <span class="badge badge-success">Aktif</span>
                              @else
                                  <span class="badge badge-danger">Pasif</span>
                              @endif
                          </td>
                          <td>
                              @if($menu->is_featured == true)
                                  <span class="badge badge-success">Evet</span>
                              @else
                                  <span class="badge badge-danger">Hayır</span>
                              @endif
                          </td>
                          <td>
                              <div class="d-flex">
                                  <a href="{{route('menu.edit',$menu)}}" type="button" class="btn btn-primary btn-burger"><i class="material-icons">edit</i></a>
                                  <form action="{{route('menu.destroy',$menu)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-burger"><i class="material-icons">delete_outline</i></button>
                                  </form>
                              </div>
                          </td>
                      </tr>
                      @empty
                          <td colspan="9" class="text-center text-secondary">Şu anda gösterilecek ürün yok</td>
                      @endforelse
                      </tbody>
                  </table>
                  {{$menus->links()}}
              </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
@endsection
