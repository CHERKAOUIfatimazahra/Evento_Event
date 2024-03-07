<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function statisTotal()
    {
        $users_count = User::count();
        $events_count = Event::count();
        $categories_count = Category::count();
        $roles_count = Role::count();
        $reservation_count = Reservation::count();
        
        return view('dashbord.statistique', compact('users_count', 'events_count', 'categories_count', 'roles_count','reservation_count'));
    } 

    public function reservationStatique(Request $request)
    {
        $organizer = $request->user();
        $total_events = $organizer->events()->count();

        $total_user_reservations = 0;

        foreach ($organizer->events as $event) {
            $total_user_reservations += $event->reserve()->count();
        }

        $total_reservations = $organizer->reserve()->count();

        return view('dashbord.static-reservation', compact('total_events','total_reservations', 'total_user_reservations'));
    }
}
