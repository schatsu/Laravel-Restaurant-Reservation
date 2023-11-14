<div class="app-sidebar">
    <div class="logo">
        <a href="{{route('home')}}" class="logo-icon"><span class="logo-text">Restaurant</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="{{route('home')}}">
                <img src="{{auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar): asset('panel/assets/images/avatars/avatar.png')}}">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{auth()->user()->name}}</span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menü
            </li>
            <li class="active-page">
                <a href="{{route('home')}}" class="active"><i class="material-icons-two-tone">home</i>Anasayfa</a>
            </li>
            <li class="active-page">
                <a href="{{route('reservation.index')}}" class="active"><i class="material-icons-two-tone">event_available</i>Rezervasyon</a>
            </li>
            <li class="active-page">
                <a href="{{route('category.index')}}" class="active"><i class="material-icons-two-tone">ballot</i>Kategori</a>
            </li>
            <li class="active-page">
                <a href="{{route('menu.index')}}" class="active"><i class="material-icons-two-tone">menu_book</i>Menü</a>
            </li>
            <li class="active-page">
                <a href="{{route('slider.index')}}" class="active"><i class="material-icons-two-tone">photo_library</i>Slider</a>
            </li>
            <li class="active-page">
                <a href="{{route('about-us.index')}}" class="active"><i class="material-icons-two-tone">contact_support</i>Hakkımızda</a>
            </li>
            <li class="active-page">
                <a href="{{route('service.index')}}" class="active"><i class="material-icons-two-tone">celebration</i>Hizmetler</a>
            </li>
            <li class="active-page">
                <a href="{{route('gallery.index')}}" class="active"><i class="material-icons-two-tone">photo_library</i>Galeri</a>
            </li>
            <li class="active-page">
                <a href="{{route('comment.index')}}" class="active"><i class="material-icons-two-tone">chat</i>Yorumlar</a>
            </li>
            <li class="active-page">
                <a href="{{route('contact.index')}}" class="active"><i class="material-icons-two-tone">contact_mail</i>Mesajlar</a>
            </li>
            <li class="active-page">
                <a href="{{route('settings.index')}}" class="active"><i class="material-icons-two-tone">settings</i>Ayarlar</a>
            </li>
            <li class="active-page">
                <a href="{{route('log-viewer.index')}}" class="active"><i class="material-icons-two-tone">monitor_heart</i>Log</a>
            </li>
        </ul>
    </div>
</div>
