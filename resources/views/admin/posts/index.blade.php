@extends('layouts.admin')

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
            <div class="table responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Owner</th>
                            <th>Image</th>
                            <th>Date Uploaded</th>
                            <th>Date Edited</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td></td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>{{$post->updated_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection