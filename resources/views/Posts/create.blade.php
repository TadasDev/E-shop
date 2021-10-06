@extends('layout')

@section('page')
    <div class="flex justify-center">
        <div class="w-1/2 p-6">
            @if(session()->has('message'))
                <div class="h-1 alert text-red-500 p-3">

                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input
                        name="title"
                        type="text"
                        placeholder="Title"
                        class="border-2 w-full p-4 rounded-lg"
                        value="{{ old('title') }}"
                    />
                    @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea
                        name="description"
                        placeholder="Description"
                        class="border-2 w-full p-4 rounded-lg"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input
                        name="price"
                        type="number"
                        placeholder="Price"
                        class="border-2 w-full p-4 rounded-lg"
                        value="{{ old('price') }}"
                        step=".01"
                    />
                    @error('price')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="mb-3 text-center bg-green-500 p-3 w-full rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

