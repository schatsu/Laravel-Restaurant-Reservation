<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm():View
    {
        return view('panel.auth.password-forgot');
    }

    public function submitForgetPasswordForm(Request $request):RedirectResponse
    {
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);

        $existingToken = DB::table('password_reset_tokens')
                    ->where('email',$request->email)
                    ->first();
        if ($existingToken)
        {
            toast('Daha önce şifre sıfırlama maili gönderildi.','info');
            return back();
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=> $token,
            'created_at'=>now(),
        ]);

        Mail::send('email.forgetPassword',['token'=>$token],function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        toast('Şifre sıfırlama maili gönderildi','success');
        return back();
    }

    public function showResetPasswordForm($token):View
    {
        return \view('panel.auth.password-reset',compact('token'));
    }

    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
           'email'=>'required|email|exists:users',
           'password'=>'required|string|min:8|confirmed',
           'password_confirmation'=>'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
                                ->where([
                                    'email'=>$request->email,
                                    'token'=>$request->token,
                                ])->first();

        if (!$updatePassword)
        {
            toast('Geçersiz token','error');
            return back();
        }
        User::query()->where('email',$request->email)
                             ->update(['password'=>Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        toast('Şifre değiştirme işlemi başarılı','success');
        return redirect()->route('login');
    }
}
