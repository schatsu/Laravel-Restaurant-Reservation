<?php

namespace App\Http\Controllers\Panel;

use App\Events\ReservationCanceled;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        $reservations = Reservation::query()
            ->search($request->search)
            ->latest()
            ->paginate(5);
        return view('panel.reservation.index',compact('reservations'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation): View
    {
        return \view('panel.reservation.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation): View
    {
        return \view('panel.reservation.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $reservation->update($validated);
            toast('Rezervasyon güncelleme işlemi başarılı','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Rezervasyon güncelleme işlemi sırasında hata oldu.','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation):RedirectResponse
    {
        try {

            ReservationCanceled::dispatch($reservation);
            $reservation->delete();
            toast('Rezervasyon silme işlemi başarılı.','success');
            return back();
        }catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            toast('Rezervasyon silme işlemi sırasında hata oldu.','error');
            return back();
        }
    }

}
