@extends('layouts.app')

@section('section-header')  
    <h2 class="border-bottom">Blog posts</h2>
@endsection

@section('content')
    @section('category-list')
    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <li class="nav-item"><a href="" class="nav-link">{{$category->name}}</a></li>
        @endforeach
    @endif
    <li class="nav-item"><a href="" class="nav-link">Others</a></li>
    @endsection

    <div class="container">
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
                    <p>{{Str::limit($post->body, 200)}}</p>
                    <a class="btn btn-danger btn-sm" href="{{route('home.posts.show', $post->id)}}">
                        Read more <span class="fa fa-angle-double-right fa-fw"></span>
                    </a>
                </div>
            </div>
            @endforeach

            <div class="d-flex p-2 shadow my-3">
                <a class="text-center mx-auto" href="{{route('home.posts.index')}}">View all Posts</a>
            </div>
        @endif
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection