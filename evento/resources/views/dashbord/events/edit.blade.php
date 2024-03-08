@extends('layout.add')

@section('content')

    <section class="bg-white">

        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded m-3 p-3"
                            href="{{ route('events.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="m-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <h2 class="mb-4 text-xl font-bold text-gray-900">Update an Event</h2>

            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Event Title</label>
                        <input type="text" name="title" id="title" value="{{ $event->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Title" required>
                    </div>
                    <div>
                        <label for="start_datetime" class="block mb-2 text-sm font-medium text-gray-900">Start Date and
                            Time</label>
                        <input type="datetime-local" name="start_datetime" id="start_datetime"
                            value="{{ date('Y-m-d\TH:i', strtotime($event->start_datetime)) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="end_datetime" class="block mb-2 text-sm font-medium text-gray-900">End Date and
                            Time</label>
                        <input type="datetime-local" name="end_datetime" id="end_datetime"
                            value="{{ date('Y-m-d\TH:i', strtotime($event->end_datetime)) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                        <input type="text" name="location" id="location" value="{{ $event->location }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                            placeholder="Location" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea name="description" id="description" rows="8"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                            placeholder="Your description here" required>{{ $event->description }}</textarea>
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price" value="{{ $event->price }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            min="0" required>
                    </div>
                    <div>
                        <label for="tickets_available" class="block mb-2 text-sm font-medium text-gray-900">Tickets
                            Available</label>
                        <input type="number" name="tickets_available" id="tickets_available"
                            value="{{ $event->tickets_available }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            min="0" required>
                    </div>
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Event Type</label>
                        <select name="type" id="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Physical" {{ $event->type === 'Physical' ? 'selected' : '' }}>Physical</option>
                            <option value="Online" {{ $event->type === 'Online' ? 'selected' : '' }}>Online</option>
                        </select>
                        @error('type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-600">
                    Update Event
                </button>
            </form>
        </div>
    </section>
@endsection
