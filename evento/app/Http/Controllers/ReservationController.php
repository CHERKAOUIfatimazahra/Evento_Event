<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index($eventId)
    {
        $reservations = Reservation::where('event_id', $eventId)
                                   ->latest()
                                   ->paginate(10);

        return view('dashbord.reservation.index', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status_reservation = $request->status_reservation;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }
}