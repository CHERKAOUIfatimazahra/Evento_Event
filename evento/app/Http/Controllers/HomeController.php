<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(6);
        
        return view('home',compact('events'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
