<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $user = auth()->user();
    
        if ($user->hasRole('admin')) {
            $events = Event::latest()->paginate(10);
        } else {
            $events = Event::where('user_id', $user->id)->latest()->paginate(10);
        }
        
        return view('dashbord.events.index', compact('events'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashbord.events.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
{
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageFileName = time() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/events/';
        $file->move($path, $imageFileName);
    }
    $event = Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'location' => $request->location,
        'start_datetime' => $request->start_datetime,
        'end_datetime' => $request->end_datetime,
        'type' => $request->type,
        'price' => $request->price,
        'tickets_available' => $request->tickets_available,
        'reservation_type' => $request->reservation_type,
        'image' => $imageFileName,
        'user_id' => auth()->id(),
        'category_id' => $request->category,
    ]);
    return redirect()->route('events.index')
                    ->with('success', 'Event created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('dashbord.events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('dashbord.events.edit', compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'type' => $request->type,
            'price' => $request->price,
            'tickets_available' => $request->tickets_available,
            'user_id' => auth()->id(),
            'category_id' => $request->category,
        ];
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/events/';
            $file->move($path, $fileName);
            $data['image'] = $fileName;
        }
    
        $event->update($data);
        
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

    public function publicEvent(Request $request, Event $event)
    {
        $event->is_published = $request->input("is_published");
        $event->save();
        return redirect()->route('events.index');
    }
}
