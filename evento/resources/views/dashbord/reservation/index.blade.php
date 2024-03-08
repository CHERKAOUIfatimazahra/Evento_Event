@extends('layout.add')

@section('content')
    <div class="p-4 sm:ml-64">
        <section class="bg-white p-3 sm:p-5">
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
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                    
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <!-- Search Form (if needed) -->
                        </div>
                        
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Event Title</th>
                                    <th scope="col" class="px-4 py-3">User</th>
                                    <th scope="col" class="px-4 py-3">Place</th>
                                    <th scope="col" class="px-4 py-3">Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reservations->isEmpty())
                                    <p class="px-4 py-3">No resrvation.</p>
                                @else
                                    @foreach ($reservations as $reservation)
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ $reservation->event->title }}</td>
                                            <td class="px-4 py-3">{{ $reservation->user->name }}</td>
                                            <td class="px-4 py-3">{{ $reservation->place }}</td>
                                            <td class="px-4 py-3">
                                                <form action="{{ route('reservations.updateStatus', $reservation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status_reservation"
                                                        class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-300">
                                                        <option value="pending" class="text-gray-700 bg-yellow-100"
                                                            {{ $reservation->status_reservation == 'pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="approved" class="px-2 rounded py-1 bg-green-500"
                                                            {{ $reservation->status_reservation == 'approved' ? 'selected' : '' }}>
                                                            Approved</option>
                                                        <option value="rejected" class="text-red-700 bg-red-100"
                                                            {{ $reservation->status_reservation == 'rejected' ? 'selected' : '' }}>
                                                            Rejected</option>
                                                    </select>
                                            <td>
                                                <button type="submit"
                                                    class="text-indigo-600 hover:text-indigo-900">Update</button>
                                            </td>
                                            </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                {{-- <a href="{{ route('reservations.show', $reservation->id) }}" class="text-primary-600 hover:text-primary-900">View</a>
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form> --}}
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
