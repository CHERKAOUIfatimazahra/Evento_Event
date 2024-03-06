<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
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
        
        return view('dashbord.statistique');
    }

    public function reservationStatique()
    {
        return view('dashbord.static-reservation');
    }
}
