@extends('layout')

@section('page')
    <div class="flex justify-center">

        <div class="w-1/2 p-6">
            <div class="text-3xl p-5 pl-0" > Edit your profile details</div>
            <form action=" {{route('profile.edit')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input
                    name="name"
                    type="text"
                    class="border-2 w-full p-4 rounded-lg "
                    value="{{$user->name }}"
                    />
                    @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input
                        name="email"
                        type="email"
                        class="border-2 w-full p-4 rounded-lg"
                        value="{{$user->email}}"
                    />
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="mb-3 text-center bg-green-500 p-3 w-full rounded-lg">Edit</button>
                </div>
            </form>
        </div>
    </div>



@endsection
