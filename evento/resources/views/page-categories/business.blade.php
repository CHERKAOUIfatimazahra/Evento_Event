@extends('layout.app')
@section('content')
    <section class="bg-cover bg-center py-32 w-full" style="background-image: url('images/2.jpg');">
        <div class="container mx-auto text-left text-white m-6 p-6">
            <div class="flex items-center">
                <div class="w-1/2">
                    <h1 class="text-5xl font-medium mb-6">Welcome to My YALLA for Business</h1>
                    <p class="text-xl mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                        euismod odio, gravida pellentesque urna varius vitae.</p>
                    <a href="#" class="bg-indigo-500 text-white py-4 px-12 rounded-full hover:bg-indigo-600">Demo</a>
                </div>
                <div class="w-1/2 pl-16">
                    <img src="https://source.unsplash.com/random?ux" class="h-64 w-full object-cover rounded-xl"
                        alt="Layout Image">
                </div>
            </div>
        </div>
    </section>
@endsection
