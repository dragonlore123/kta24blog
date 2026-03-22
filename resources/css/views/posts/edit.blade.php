@extends('partials.layout')
@section('title', 'Edit ' . $post->title)
@section('content')
    <div class="card bg-base-300 shadow-sm w-1/2 mx-auto">
        <div class="card-body">
            <h1 class="card-title">{{ __('Edit Post') }}</h1>
            <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
                @method('PUT')
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Title') }}</legend>
                    <input name="title" type="text" class="input w-full @error('title') border-error @enderror" placeholder="Title" value="{{ old('title') ?? $post->title }}" />
                    @error('title')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Content') }}</legend>
                    <textarea name="body" class="textarea @error('body') border-error @enderror h-48 w-full" placeholder="{{ __('Write something cool...') }}">{{ old('body') ?? $post->body }}</textarea>
                    @error('body')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button class="btn btn-success mt-2 float-end">Update</button>
            </form>
        </div>
    </div>
@endsection
