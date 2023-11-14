<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sliderCount = Slider::query()->where('status',true)->count();
        $categoryCount = Category::query()->where('status',true)->count();
        $menuCount = Menu::query()->where('status',true)->count();
        $reservationCount = Reservation::query()->count();
        $serviceCount = Service::query()->where('status',true)->count();
        $commentCount = Comment::query()->where('status',true)->count();
        return view('panel.dashboard',compact(['sliderCount','categoryCount',
            'menuCount','reservationCount',
            'serviceCount','commentCount']));
    }
}
