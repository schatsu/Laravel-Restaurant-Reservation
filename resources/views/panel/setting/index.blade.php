@extends('panel.layouts.app')
@section('title')
Ayarlar
@endsection
@section('page-title')
<p class="text-center">Site ayarları</p>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <img src="{{isset($settings->logo) ? asset('storage/'.$settings->logo) : asset('panel/assets/images/avatars/avatar.png')}}" class="rounded-circle" alt="logo" height="64px" width="64px">
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputSiteLogo" class="form-label">Site logo</label>
                        <input name="logo" type="file" class="form-control" id="inputSiteLogo">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteName" class="form-label">Site adı</label>
                        <input name="site_name" type="text" value="{{isset($settings) ? $settings->site_name : ''}}" class="form-control"  id="inputSiteName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteEmail" class="form-label">E-posta</label>
                        <input name="email" type="email" value="{{isset($settings) ? $settings->email : ''}}" class="form-control" id="inputSiteEmail">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSitePhone" class="form-label">Telefon</label>
                        <input name="phone" type="text" value="{{isset($settings) ? $settings->phone : ''}}" class="form-control" id="inputSitePhone">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteAddress" class="form-label">Adres</label>
                        <textarea name="address" type="text" class="form-control" id="inputSiteAddress">{{isset($settings) ? $settings->address : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteAddressGoogle" class="form-label">Google adres</label>
                        <textarea name="google_maps" type="text" class="form-control" id="inputSiteAddressGoogle">{{isset($settings) ? $settings->google_maps : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteWorkingHours" class="form-label">Çalışma saatleri</label>
                        <input name="working_hours" type="text" value="{{isset($settings) ? $settings->working_hours : ''}}" class="form-control" id="inputSiteWorkingHours">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteInstagram" class="form-label">Instagram</label>
                        <input name="instagram" type="text" value="{{isset($settings) ? $settings->instagram : ''}}" class="form-control" id="inputSiteInstagram">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteFacebook" class="form-label">Facebook</label>
                        <input name="facebook" type="text" value="{{isset($settings) ? $settings->facebook : ''}}" class="form-control" id="inputSiteFacebook">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteTwitter" class="form-label">Twitter</label>
                        <input name="twitter" type="text" value="{{isset($settings) ? $settings->twitter : ''}}" class="form-control" id="inputSiteTwitter">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteSeoKeywords" class="form-label">Anasayfa seo kelimeler</label>
                        <textarea name="seo_keywords_home" class="form-control" id="inputSiteSeoKeywords">{{isset($settings) ? $settings->seo_keywords_home : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteDescription" class="form-label">Anasayfa seo açıklama</label>
                        <textarea name="seo_description_home" class="form-control" id="inputSiteDescription">{{isset($settings) ? $settings->seo_description_home : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteSeoKeywords" class="form-label">Hakkımızda seo kelimeler</label>
                        <textarea name="seo_keywords_about_us" class="form-control" id="inputSiteSeoKeywords">{{isset($settings) ? $settings->seo_keywords_about_us : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteDescription" class="form-label">Hakkımızda seo açıklama</label>
                        <textarea name="seo_description_about_us" class="form-control" id="inputSiteDescription">{{isset($settings) ? $settings->seo_description_about_us : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteSeoKeywords" class="form-label">Menü seo kelimeler</label>
                        <textarea name="seo_keywords_menu" class="form-control" id="inputSiteSeoKeywords">{{isset($settings) ? $settings->seo_keywords_menu : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSiteDescription" class="form-label">Menü seo açıklama</label>
                        <textarea name="seo_description_menu" class="form-control" id="inputSiteDescription">{{isset($settings) ? $settings->seo_description_menu : ''}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputSiteFooterText" class="form-label">Footer yazı</label>
                        <textarea name="footer_text" class="form-control" id="inputSiteFooterText">{{isset($settings) ? $settings->footer_text : ''}}</textarea>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
