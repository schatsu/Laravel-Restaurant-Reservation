@extends('panel.layouts.app')
@section('title')
    Anasayfa
@endsection
@section('style')
    <link href="{{asset('panel/assets/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">
@endsection
@section('page-title')
    <p class="text-center">Anasayfa</p>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-success">
                            <i class="material-icons-outlined">image</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Aktif slider sayısı</span>
                            <span class="widget-stats-amount">{{$sliderCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-purple">
                            <i class="material-icons-two-tone">ballot</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Aktif kategori sayısı</span>
                            <span class="widget-stats-amount">{{$categoryCount}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-primary">
                            <i class="material-icons-outlined">menu_book</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Ürün sayısı</span>
                            <span class="widget-stats-amount">{{$menuCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-danger">
                            <i class="material-icons-outlined">event</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Rezervasyon sayısı</span>
                            <span class="widget-stats-amount">{{$reservationCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-success">
                            <i class="material-icons-outlined">celebration</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Aktif hizmet sayısı</span>
                            <span class="widget-stats-amount">{{$serviceCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-warning">
                            <i class="material-icons-outlined">chat</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Aktif yorum sayısı</span>
                            <span class="widget-stats-amount">{{$commentCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Sütun Grafiği</h5>
                </div>
                <div class="card-body">
                    <div id="apex3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/js/pages/charts-apex.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
@endsection
