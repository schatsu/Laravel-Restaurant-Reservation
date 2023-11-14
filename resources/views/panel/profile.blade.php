@extends('panel.layouts.app')
@section('title')
    Profil
@endsection
@section('page-title')
 <p class="text-center">Profil bilgileri</p>
@endsection
@section('style')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
 <div class="row">
{{--profile--}}
     <div class="col-xl-6">
         <div class="card">
             <div class="card-header">
                 <a data-fslightbox="gallery" href="{{$admin->avatar ? asset('storage/'.$admin->avatar) : asset('panel/assets/images/avatars/avatar.png')}}">
                     <img id="image" src="{{$admin->avatar ? asset('storage/'.$admin->avatar) : asset('panel/assets/images/avatars/avatar.png')}}" height="72" width="72" alt="{{$admin->name}}" class="rounded-circle">
                 </a>
             </div>
             <div class="card-body">
                 <form method="post" action="{{route('change-profile')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="col-md-12">
                         <label for="inputName" class="form-label">Ad</label>
                         <input name="name" type="text" class="form-control" value="{{$admin->name}}" id="inputName">
                     </div>
                     <div class="col-md-12">
                         <label for="inputEmail" class="form-label">E-Posta</label>
                         <input name="email" type="email" class="form-control" value="{{$admin->email}}" id="inputEmail">
                     </div>
                     <div class="col-md-12">
                         <label for="inputAvatar" class="form-label">Avatar</label>
                         <input name="avatar" type="file" class="form-control" id="inputAvatar">
                     </div>
                     <div class="col-12 mt-3">
                         <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
{{--password--}}
     <div class="col-xl-6">
         <div class="card">
             <div class="card-header">
                 <h5 class="text-center">Şifre</h5>
             </div>
             <div class="card-body">
                 <form action="{{route('change-password')}}" method="post">
                     @csrf
                     <div class="col-md-12 password-container" >
                         <label for="inputOldPassword" class="form-label">Mevcut şifre</label>
                         <input name="password" type="password" class="form-control" id="inputOldPassword">
                         <i class="fa fa-solid fa-eye password-toggle"></i>
                     </div>
                     <div class="col-md-12 password-container" >
                         <label for="inputNewPassword" class="form-label">Yeni şifre</label>
                         <input name="new_password" type="password" class="form-control" id="inputNewPassword">
                         <i class="fa fa-solid fa-eye password-toggle"></i>
                     </div>
                     <div class="col-md-12 password-container" >
                         <label for="inputNewPasswordConfirmation" class="form-label">Yeni şifre onay</label>
                         <input name="password_confirmation" type="password" class="form-control" id="inputNewPasswordConfirmation">
                         <i class="fa fa-solid fa-eye password-toggle"></i>
                     </div>
                     <div class="col-12 mt-3">
                         <button type="submit" class="btn btn-warning float-end"><i class="material-icons-outlined">sync_alt</i>Güncelle</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
@endsection
@section('js')
    <script src="{{asset('panel/assets/plugins/lightbox/fslightbox.js')}}"></script>
    <script src="{{asset('panel/assets/js/pages/lightbox.js')}}"></script>
    <script>
        let file = document.getElementById('inputAvatar');
        let img = document.getElementById('image');
        file.addEventListener("change",(e)=>{
            img.src=URL.createObjectURL(e.target.files[0])
        })

        //pass
        const passwordInputs = document.querySelectorAll('input[type="password"]');
        const passwordToggle = document.querySelectorAll('.password-toggle');

        passwordToggle.forEach((toggle, index) => {
            toggle.addEventListener('click', function () {
                if (passwordInputs[index].type === 'password') {
                    passwordInputs[index].type = 'text';
                } else {
                    passwordInputs[index].type = 'password';
                }
            });
        });
    </script>
@endsection
