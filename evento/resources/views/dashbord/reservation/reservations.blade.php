@extends('layout.add')

@section('content')
    <div class="p-4 sm:ml-64">
        <section class="bg-white p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <!-- Search Form (if needed) -->
                        </div>
                        @if ($message = Session::get('success'))
                            <div
                                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full sm:w-1/2 lg:w-1/3">
                                <strong class="font-bold">Success!</strong>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div
                                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full sm:w-1/2 lg:w-1/3">
                                <strong class="font-bold">Error!</strong>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="overflow-x-auto">
                        
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Event Title</th>
                                    <th scope="col" class="px-4 py-3">Place</th>
                                    <th scope="col" class="px-4 py-3">Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reservations->isEmpty())
                                    <p>No resrvation.</p>
                                @else
                                    @foreach ($reservations as $reservation)
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ $reservation->event->title }}</td>
                                            <td class="px-4 py-3">{{ $reservation->place }}</td>
                                            <td class="px-4 py-3">
                                                {{ $reservation->status }}

                                                @if ($reservation->status_reservation === 'pending')
                                                    <div class="mt-4 text-red-500">reservation of
                                                        {{ $reservation->event->title }} is pending.</div>
                                                @elseif ($reservation->status_reservation === 'approved')
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Télécharger
                                                    </button>
                                            </td>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('user.reservation.details', ['userId' => auth()->user()->id, 'reservationId' => $reservation->id]) }}"
                                                    class="text-primary-600 hover:text-primary-900">View Reservation Details</a>
                                            </td>
                                        @elseif($reservation->status_reservation === 'rejected')
                                            <div class="mt-4 text-red-500">reservation of
                                                {{ $reservation->event->title }} is rejected</div>
                                        @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 bg-white"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500">
                            {{ $reservations->firstItem() }}-{{ $reservations->lastItem() }} of
                            {{ $reservations->total() }}
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            {{ $reservations->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
@endsection
