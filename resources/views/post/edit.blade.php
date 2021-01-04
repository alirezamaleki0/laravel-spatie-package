@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        {!! \Session::get('message') !!}
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                <form method="POST" action="{{ route('post.edit', $post->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="postTitle" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="postBody" class="form-label">Text</label>
                        <textarea class="form-control" name="body" id="postBody" rows="5">{{ $post->body }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Edit Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
