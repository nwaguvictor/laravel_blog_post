@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="container">
        <h2 class="border-bottom">Blog posts</h2>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
            <div class="card-body">
                <h3><a href="{{route('home.posts.show', $post->id)}}">{{$post->title}}</a></h3>
                <p class="py-1">
                    <span class="text-muted">
                        <strong><i class="fa fa-user fa-fw"></i>{{$post->user->name ?? 'Anonymous'}}</strong>
                    </span> &nbsp;| 
                    <span class="text-muted">
                        <strong><i class="fa fa-comments fa-fw"></i>{{count($post->comments)}}</strong>
                    </span> &nbsp;| 
                    <span class="text-muted">
                        <strong><i class="fa fa-calendar-alt fa-fw"></i>{{$post->created_at}}</strong>
                    </span>
                </p>
                <div class="shadow p-2 rounded bg-light">
                    <img class="img-fluid" style="width: 100%; height: 300px" 
                        src="{{$post->image ?? 'https://placehold.it/100'}}" alt="post image">
                </div>
                <div class="post-body my-4">
                    <p>{{$post->body}}</p>
                </div>
            </div>
            @endforeach

            <div class="d-flex border-top my-2 py-2">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection