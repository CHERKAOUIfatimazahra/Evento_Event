<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function statisTotal()
    {
        return view('dashbord.statistique');
    }

    public function reservationStatique()
    {
        return view('dashbord.static-reservation');
    }
}
