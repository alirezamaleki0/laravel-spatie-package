@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (\Session::has('message'))
                    <div class="alert alert-success" style="width: 40rem;">
                        {!! \Session::get('message') !!}
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger" style="width: 40rem;">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        Posts
                        @role('writer|admin')
                        <a href="post/create">new</a>
                        @endrole
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                <a href="/post/{{ $post->id }}" style="text-decoration: none; color: black">
                                    {{ $post->body }} </a>
                                @can('edit post')
                                <div><a href="/post/{{ $post->id }}/edit">edit</a></div>
                                @endcan
                                @role('admin')
                                <div><a href="/post/{{ $post->id }}/delete">delete</a></div>
                                @endrole
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
