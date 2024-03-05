<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        
        return view('events.index',compact('events'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $request->validated();

        Event::create($request->all());
         
        return redirect()->route('events.index')
                        ->with('success','events created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $request->validated();
        $event->update($request->validated());
        
        return redirect()->route('events.index')
                        ->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
         
        return redirect()->route('events.index')
                        ->with('success','Event deleted successfully');
    }
}
