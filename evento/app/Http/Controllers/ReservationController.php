<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;
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
    public function reservation(Request $request, $eventId) {

        $user = auth()->user();
        $event = Event::findOrFail($eventId);
//cheque reservation date 
        $currentTime = Carbon::now();
        if ($currentTime->lt($event->start_datetime) || $currentTime->gt($event->end_datetime)) {
            return redirect()->back()->with('error', 'Sorry, you cannot reserve for events outside the event timeframe.');
        }
//cheque user reservation
        $existingReservation = Reservation::where('event_id', $eventId)
                                      ->where('user_id', $user->id)
                                      ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'You have already reserved this event.');
        }
//cheque ticket available
        if ($event->tickets_available <= 0) {
            return redirect()->back()->with('error', 'Sorry, all the places already reserved!');
        }

//create reservation
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->event_id = $event->id;
        $event->decrement('tickets_available');
        $placeNumber = ($event->tickets_available - $existingReservation)+1;
        $reservation->place = $placeNumber;

        if ($event->reservation_type === 'automatique') {
            $reservation->status_reservation = 'approved';
        } else {
            $reservation->status_reservation = 'pending';
        }
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation made successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status_reservation = $request->status_reservation;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

}