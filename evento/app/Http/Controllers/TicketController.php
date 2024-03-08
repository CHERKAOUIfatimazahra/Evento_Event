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
    
    public function userReservations($userId, $reservationId)
{
    // Retrieve the authenticated user
    $user = auth()->user();

    // Fetch the reservation based on the provided reservation ID
    $reservation = Reservation::findOrFail($reservationId);

    // Check if the user is authorized to view this reservation
    if ($user->id !== $reservation->user_id) {
        abort(403, 'Unauthorized');
    }

    // Pass the reservation and user ID to the view
    return view('dashbord.reservation.tickets_reservations', compact('reservation', 'userId'));
}
}