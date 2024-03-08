@extends('layout.add')

@section('content')
    <div class="mx-auto bg-gray-700 h-screen flex items-center justify-center px-8" style="background-image: url('https://cdn1.vectorstock.com/i/1000x1000/79/30/events-background-with-maple-leaves-vector-10537930.jpg')">
        <div class="flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
            <div class="w-full h-64 bg-top bg-cover rounded-t" style="background-image: url({{ asset('uploads/events/' . $reservation->event->image) }})"></div>
            <div class="flex flex-col w-full md:flex-row">
                <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-gray-400 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                    <div class="flex items-center">
                        <span class="font-semibold w-24">Event start at:</span>
                        <span>{{ $reservation->event->start_datetime }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold w-24">Event End at:</span>
                        <span>{{ $reservation->event->end_datetime }}</span>
                    </div>
                </div>
                <div class="p-4 font-normal text-gray-800 md:w-3/4">
                    <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">title : {{ $reservation->event->title }}</h1>
                    <p class="leading-normal">description : {{ $reservation->event->description }}</p>
                    <div class="flex flex-row items-center mt-4 text-gray-700">
                        <div class="w-1/2">
                            <p>location: </p>{{ $reservation->event->location }}
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold w-24">Type:</span>
                        <span>{{ $reservation->event->type }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold w-24">Your Seat:</span>
                        <span>{{ $reservation->place }}</span>
                    </div>
                </div>
                <div class="w-1/3 flex justify-end">
                    <img src="https://www.printempsdunumerique.fr/wp-content/uploads/2016/09/code-barre-2d.jpg" alt="Event Logo" class="w-8">
                </div>
            </div>
        </div>
    </div>
@endsection