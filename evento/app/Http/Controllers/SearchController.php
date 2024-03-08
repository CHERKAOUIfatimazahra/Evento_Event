<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function index()
    // {
    //     $event = Event::get();
    //     $categories = Category::get();
    //     return view('events.search', compact('event','categories'));
    // }

    public function search(Request $request)
    {
        $event = Event::query();
        $categories = Category::get();
        
        if ($request->keyword) {
            $event->where('title', 'LIKE', '%' . $request->keyword . '%');
        }

        if ($request->category) {
            $event->where('title', 'LIKE', '%' . $request->keyword . '%')
                    ->where('category_id', $request->category);
        }

        $filteredEvents = $event->get();

        return response()->json(['events' => $filteredEvents]);
    }

    public function filterByCategory($ids)
    {
        $ids = explode(',', $ids);

        if (count($ids) == 0) {
            $filteredEvents = Event::get();
        } else {
            $filteredEvents = Event::whereIn('category_id', $ids)->get();
        }
        return response()->json(['products' => $filteredEvents]);
    }
}
