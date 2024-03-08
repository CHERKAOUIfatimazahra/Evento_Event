@extends('layout.add')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded m-7 p-7"
                    href="{{ route('events.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    <section class="bg-white" >
        <div class="py-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new Event</h2>
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Event Title</label>
                        <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Title" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea name="description" id="description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Your description here" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                        <input type="text" name="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Location" value="{{ old('location') }}" required>
                        @error('location')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="start_datetime" class="block mb-2 text-sm font-medium text-gray-900">Start Date
                            and Time</label>
                        <input type="datetime-local" name="start_datetime" id="start_datetime"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('start_datetime') }}" required>
                        @error('start_datetime')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="end_datetime" class="block mb-2 text-sm font-medium text-gray-900">End Date and
                            Time</label>
                        <input type="datetime-local" name="end_datetime" id="end_datetime"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('end_datetime') }}" required>
                        @error('end_datetime')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Event Type</label>
                        <select name="type" id="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Physical" {{ old('type') === 'Physical' ? 'selected' : '' }}>Physical</option>
                            <option value="Online" {{ old('type') === 'Online' ? 'selected' : '' }}>Online</option>
                        </select>
                        @error('type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="reservation_type" class="block mb-2 text-sm font-medium text-gray-900">Reservation Type</label>
                        <select name="reservation_type" id="reservation_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="automatique" {{ old('reservation_type') === 'automatique' ? 'selected' : '' }}>Automatique</option>
                            <option value="manuelle" {{ old('reservation_type') === 'manuelle' ? 'selected' : '' }}>Manuelle</option>
                        </select>
                        @error('reservation_type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('price') }}" min="0" required>
                        @error('price')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="tickets_available"
                            class="block mb-2 text-sm font-medium text-gray-900">Tickets Available</label>
                        <input type="number" name="tickets_available" id="tickets_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('tickets_available') }}" min="0" required>
                        @error('tickets_available')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-600">
                    Add Event
                </button>
            </form>
        </div>
    </section>

@endsection
