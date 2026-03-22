@extends('partials.layout')
@section('title', 'Home Page')
@section('content')
    <h1 class="text-4xl">Home</h1>
    <div class="text-center my-2">
        {{ $posts->links() }}
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($posts as $post)
            <div class="card card-side bg-base-300 shadow-sm">
                <figure class="min-w-3xs">
                    <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp" alt="Movie" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p>{{$post->snippet}}</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Read More</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
