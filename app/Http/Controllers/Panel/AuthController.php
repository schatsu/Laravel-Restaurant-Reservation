<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin() : View
    {
        return \view('panel.auth.login');
    }

    public function login(LoginRequest $request) : RedirectResponse
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $user = User::query()->where('email',$email)->first();

            if ($user && Hash::check($password,$user->password))
            {
                Auth::login($user);
                toast('Hoşgeldiniz','success');
                return redirect()->intended('/admin');
            }else
            {
                toast('Verdiğiniz bilgileri kontrol ediniz','error');
                return redirect()->back();
            }
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Giriş yapılırken bir hata oluştu.','error');
            return  redirect()->back();
        }

    }

    public function logout(Request $request) : RedirectResponse
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            toast('Başarılı çıkış','success');
            return redirect()->route('login');
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Çıkış yapılırken bir hata oluştu.','error');
            return redirect()->back();
        }
    }

}
