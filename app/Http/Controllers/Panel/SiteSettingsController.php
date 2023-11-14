<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SiteSettingsController extends Controller
{
    public function siteSettings():View
    {
        $settings = Settings::query()->first();
        return view('panel.setting.index',compact('settings'));
    }


    public function updateSiteSettings(UpdateSettingsRequest $request):RedirectResponse
    {
        try {
            $validate = $request->validated();
//            $settings = Settings::query()->first();
            if ($request->hasFile('logo'))
            {
                $file = $request->file('logo');
                $imgName = Str::random(2).'-'.$file->hashName();
                $imgPath = $file->storeAs('logo',$imgName,'public');
                $validate['logo'] = $imgPath;
            }
            Settings::query()->updateOrCreate($validate);
            toast('Site ayarları güncelleme işlemi başarılı','success');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Site ayarları güncelleme işlemi sırasında hata oldu','error');
            return redirect()->back();
        }
    }


}
