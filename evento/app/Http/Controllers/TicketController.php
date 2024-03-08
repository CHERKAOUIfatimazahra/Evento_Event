<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showReservations($userId)
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $userId)
                                ->latest()
                                ->paginate(10);

        return view('dashbord.reservation.reservations', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function userReservations(Event $event)
    {
        $user = auth()->user();
        
        $reservations = Reservation::where('user_id', $user->id)
                                   ->where('event_id', $event->id)
                                   ->latest()
                                   ->paginate(10);

        return view('tickets_reservations', compact('reservations', 'event'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}