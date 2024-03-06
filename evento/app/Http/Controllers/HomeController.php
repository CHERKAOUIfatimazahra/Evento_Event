<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(5);

        return view('home', compact('publishedEvents'));
    }
}
