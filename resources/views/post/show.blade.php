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
                <div class="card" style="width: 50rem;">
                    <div class="card-header">
                        Post #{{ $post->id }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h1>{{ $post->title }}</h1>
                        </li>
                        <li class="list-group-item">
                            {{ $post->body }}
                            @can('edit post')
                            <div><a href="/post/{{ $post->id }}/edit">edit</a></div>
                            @endcan
                            @role('admin')
                            <div><a href="/post/{{ $post->id }}/delete">delete</a></div>
                            @endrole
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
