<div class="app-header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown"><i class="material-icons-two-tone">person</i></a>
                        <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                            <h6 class="dropdown-header">{{auth()->user()->name}}</h6>
                            <div class="notifications-dropdown-list">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary" href="{{route('profile')}}">
                                            <i class="material-icons-two-tone" style="vertical-align: middle;">person</i>
                                            <span class="align-middle">Profil</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{route('logout')}}" method="post">
                                            @csrf
                                            <button class="btn text-secondary btn-sm mx-2" href="#">
                                                <i class="material-icons-two-tone" style="vertical-align: middle;">logout</i>
                                                <span class="align-middle">Çıkış yap</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
