<?php

namespace App\Http\Controllers\Site;

use App\Events\ContactCreated;
use App\Events\ReservationCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactFormRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactForm;
use App\Models\Form;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function home():View
    {

        $sliders = Cache::remember('sliders',60,function (){

          return Slider::query()
              ->where('status',true)
              ->orderBy('order')
              ->get();
        });


        $aboutUs = Cache::remember('about-us', 1800, function () {
            return AboutUs::query()->find(1);
        });

        $isFeatured = Cache::remember('is_featured',60,function (){

            return Menu::query()
                ->where('is_featured', true)
                ->where('status', true)
                ->with('categories')
                ->limit(3)
                ->get();
        });

        $galleries = Cache::remember('gallery',1800,function (){

           return Gallery::query()
                ->where('status',1)
                ->orderBy('order')
               ->get();

        });

        $comments = Cache::remember('comment',1800,function (){

            return Comment::query()->whereStatus(1)->get();

        });

        $settings = Settings::query()->select('google_maps','seo_keywords_home','seo_description_home')->first();

        return view('site.pages.home-page',compact([
            'sliders','aboutUs','isFeatured',
            'galleries','comments','settings'
        ]));
    }
    public function aboutUs():View
    {
        $aboutUs = Cache::remember('aboutUs',60*60,function (){
           return AboutUs::query()->first();
        });

        $galleries = Cache::remember('gallery',60*60,function (){

            return Gallery::query()
                ->where('status',1)
                ->orderBy('order')
                ->get();

        });

        return view('site.pages.about-us',compact(['aboutUs','galleries']));
    }

    public function menu():View
    {
        $categories= Category::query()
            ->where('status',1)
            ->with('menu')
            ->orderBy('order')
            ->get();
        return \view('site.pages.menu',compact('categories'));
    }

    public function category($slug):View
    {
        $category = Category::query()
            ->where('status',1)
            ->where('slug',$slug)
            ->with('menu')
            ->first();

        return \view('site.pages.category',compact('category'));
    }
    public function meal($slug1,$slug2):View
    {
        $category = Category::query()
            ->where('status',1)
            ->where('slug',$slug1)
            ->first();
        $menu = Menu::query()
            ->where('status',1)
            ->where('slug',$slug2)
            ->first();
        return view('site.pages.menu-detail',compact(['category','menu']));
    }

    public function service():View
    {
        $services =  Cache::remember('services',60*60,function (){

            return   Service::query()
                ->where('status',true)
                ->get();
        });

        return view('site.pages.service',compact('services'));
    }
    public function showReservation():View
    {
        return \view('site.pages.reservation');
    }

    public function reservation(StoreReservationRequest $request):RedirectResponse
    {
        try {
            $validated = $request->validated();
            $reservation = Reservation::query()->create($validated);
            ReservationCreated::dispatch($reservation);
            toast('Tebrikler rezervasyonunuz oluşturuldu.','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Rezervasyon oluşturma işlemi sırasında hata oldu.','error');
            return back();
        }
    }

    public function contact():View
    {
        $settings = Cache::remember('contact',3600,function (){
           return  Settings::query()->select('email','phone','address','google_maps','working_hours')->first();
       });
        return view('site.pages.contact',compact('settings'));
    }

    public function contactForm(StoreContactFormRequest $request):RedirectResponse
    {
        try {
            $validate = $request->validated();
            $contact = ContactForm::query()->create($validate);
            ContactCreated::dispatch($contact);
            toast('Mesajınız başarıyla gönderilmiştir','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Mesaj gönderme işlemi sırasında bir hata oluştu','error');
            return back();
        }
    }

}
