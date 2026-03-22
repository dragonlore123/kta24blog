@extends('partials.layout')
@section('title', __('New Post'))
@section('content')
    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
    <div class="card bg-base-200 shadow-sm w-1/2 mx-auto">
        <div class="card-body">
            <table class="table table-zebra">
                <tbody>
                    <tr class="hover:bg-base-300!">
                        <th>ID</th>
                        <td>{{ $post->id }}</td>
                    </tr>
                     <tr class="hover:bg-base-300!">
                        <th>Title</th>
                        <td>{{ $post->title }}</td>
                    </tr>
                     <tr class="hover:bg-base-300!">
                        <th>Content</th>
                        <td>{!! $post->displayBody !!}</td>
                    </tr>
                     <tr class="hover:bg-base-300!">
                        <th>Created</th>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                     <tr class="hover:bg-base-300!">
                        <th>Updated</th>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
