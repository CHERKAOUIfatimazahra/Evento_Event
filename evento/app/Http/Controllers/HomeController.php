<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(5);

        return view('home', compact('publishedEvents'));
    }
    public function eventShow(Event $event)
    {
        return view('single_page', compact('event')); 
    }
    public function findEvent()
    {
        $categories = Category::get();
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(5);

        return view('find-event', compact('publishedEvents','categories'));
    }

}
