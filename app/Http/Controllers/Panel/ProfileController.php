<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function showProfile(): View
    {
        $admin = Auth::user();
        return view('panel.profile',compact('admin'));
    }

    public function changeProfile(ChangeProfileRequest $request) : RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('avatar'))
            {
                $file = $request->file('avatar');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('avatar',$imgName,'public');
                $validated['avatar'] = $imgPath;


                if (isset(auth()->user()->avatar))
                {
                    Storage::disk('public')->delete(auth()->user()->avatar);
                }
            }


            User::query()->update($validated);
            toast('Kullanıcı bilgileri güncelleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            return redirect()->back();
        }

    }

    public function changePassword(Request $request)
    {
        try {
            $admin = Auth::user();
            $textPassword = $request->password;
            $hashedPassword = $admin->password;
            if (!Hash::check($textPassword,$hashedPassword))
            {
                toast('Mevcut şifrenizi yanlış girdiniz.','error');
                return back();
            }
            //new password check
            $newPassword = $request->new_password;
            $newPasswordConfirmation = $request->password_confirmation;
            if ($newPassword !== $newPasswordConfirmation)
            {
                toast('Yeni girdiğiniz şifreler birbiri ile uyuşmuyor.','error');
                return back();
            }
            $admin->password = Hash::make($newPassword);
            $admin->save();
            toast('Şifreniz başarıyla değişti','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Şifre güncelleme işlemi sırasında bir hata oldu.');
        }

    }
}
