@extends('layout.add')

@section('content')

<div class="p-4 sm:ml-64">
    <section class="bg-white p-3 m-6 sm:p-5">
        <div style="background-image:url('https://cdn1.vectorstock.com/i/1000x1000/79/30/events-background-with-maple-leaves-vector-10537930.jpg');"
        class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="max-w-7xl mx-auto  px-4 sm:px-6 lg:py-24 lg:px-8">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Your Events statistics</h2>
                    </div>
                    <div class="max-w-7xl mx-auto  px-4 sm:px-6 lg:py-24 lg:px-8">
                        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Events</dt>
                                    <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{ $total_events }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow sm:rounded-lg mt-4">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total User Reservations</dt>
                                    <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{ $total_user_reservations }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
