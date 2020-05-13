@extends('layouts.dashboard')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row my-2">
        <div class="col-md-12">
            <a class="btn btn-sm btn-danger" href="{{route('posts.create')}}">
                <i class="fa fa-plus fa-fw"></i>Add Post
            </a>
            <span class="text-mute"><i class="fa fa-info fa-fw"></i>Create a Post</span>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-md-12">
            @if (count($posts) > 0)
            <div class="table responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Published by</th>
                            <th>Comments</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><a href="{{route('home.posts.show', $post->id)}}">{{$post->title}}</a></td>
                                    <td><img class="fluid" 
                                        style="max-width: 100%" src="{{$post->image ?? 'https://placehold.it/100'}}" 
                                        width="40" height="20" 
                                        alt="post-image">
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{count($post->comments)}}</td>
                                    <td><a href="{{route('posts.show', $post->id)}}">More Details</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </tbody>
                </table>
            </div>
            @else
                <p>Hey! <strong>{{auth()->user()->name}}</strong>, there no post, please create one.</p>
            @endif
        </div>
    </div>
@endsection