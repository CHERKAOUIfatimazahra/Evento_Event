@extends('layout.add')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded m-7 p-7"
                    href="{{ route('events.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="mx-4">
        <div class="bg-white border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">

                <h3 class="text-2xl mb-2">{{ $event->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $event->location }}</div>

                <div class="text-lg my-4">
                    <i class="fa-regular fa-clock"></i> Start: {{ $event->start_datetime }}
                    <br>
                    <i class="fa-regular fa-clock"></i> End: {{ $event->end_datetime }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Event Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $event->description }}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
