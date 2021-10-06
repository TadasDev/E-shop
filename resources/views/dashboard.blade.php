@extends('layout')

@section('page')
    <div
        class="container mx-auto content-center m-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        @if($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="max-w-screen-sm rounded overflow-hidden shadow-lg ">
                    <img class="w-full"
                         src="data:image/png;base64,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"
                         alt="Mountain">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$post->title}}</div>
                        <div class="font-bold text-xl mb-2">${{$post->price}}</div>
                        <p class="text-gray-700 text-base">
                            {{$post->description}}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#bestSeller</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                    <form action="{{route('posts.show',['post'=>$post,'title'=>$post->title])  }}" method="GET">
                        <button
                            type="submit"
                            class="
        m-5
        bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            show more
                        </button>
                    </form>
                </div>
            @endforeach

    </div>
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
    @else
        No posts yet
    @endif

@endsection
