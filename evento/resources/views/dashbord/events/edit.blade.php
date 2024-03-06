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

        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Update an Event</h2>
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Event Title</label>
                            <input type="text" name="title" id="title" value="{{ $event->title }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Title" required="">
                        </div>
                        <div class="w-full">
                            <label for="start_datetime" class="block mb-2 text-sm font-medium text-gray-900">Start Date and
                                Time</label>
                            <input type="datetime-local" name="start_datetime" id="start_datetime"
                                value="{{ date('Y-m-d\TH:i', strtotime($event->start_datetime)) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div class="w-full">
                            <label for="end_datetime" class="block mb-2 text-sm font-medium text-gray-900">End Date and
                                Time</label>
                            <input type="datetime-local" name="end_datetime" id="end_datetime"
                                value="{{ date('Y-m-d\TH:i', strtotime($event->end_datetime)) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" value="{{ $event->location }}"
                                class="form-control" required="">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="8" class="form-control" required="">{{ $event->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" value="{{ $event->price }}"
                                class="form-control" required="">
                        </div>
                        <div class="mb-3">
                            <label for="tickets_available" class="form-label">Tickets Available</label>
                            <input type="number" name="tickets_available" id="tickets_available" value="{{ $event->tickets_available }}"
                                class="form-control" required="">
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
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-600">
                        Update Event
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection
