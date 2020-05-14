@extends('layouts.dashboard')

@section('title')
    Post ({{Str::limit($post->title, 20)}})
@endsection

@section('content')
    <div class="row my-2 border-bottom d-flex px-2">
        <h4 class="align-self-center">Post Details</h4>
        <a href="{{route('posts.index')}}" class="ml-auto btn btn-sm btn-primary mb-2">
            <i class="fa fa-angle-double-left fa-fw"></i>Back
        </a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="shadow p-2 rounded bg-light">
                <img class="img-fluid" style="width: 100%; height: 300px" 
                    src="{{$post->image ?? 'https://placehold.it/100'}}" alt="post image">
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">Post ID: {{$post->id}}</h4>
                        {{-- Restricting user's action with Gates --}}
                        @can(['update', 'delete'], $post)
                        
                        <div class="d-flex ml-auto  align-baseline">
                            <a href="{{route('posts.edit', $post->id)}}" 
                                class="btn btn-sm btn-secondary align-self-baseline">
                                <i class="fa fa-edit fa-fw"></i>&nbsp;Edit
                            </a>
                            <form class="form mx-2" action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i>Delete</button>
                            </form>
                        </div>
        
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>Post Title: </strong>{{$post->title}}</p>
                    <p><strong>Published by: </strong>{{$post->user->name}}</p>
                    <p><strong>In Category: </strong>{{$post->category->name}}</p>
                    <p><strong>Comment Counts: </strong>{{count($post->comments)}}</p>
                    <p><strong>Published on: </strong>{{$post->created_at->diffForHumans()}}</p>
                    <p><strong>Last Updated : </strong>{{$post->updated_at->diffForHumans()}}</p>
                    
                    <div class="d-flex border-top my-2 pt-2">
                        <a class="btn btn-primary btn-sm mx-auto" href="{{route('home.posts.show', $post->id)}}">View Post</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    @if (session('update'))
        <script>
            toastr.success("{{session('update')}}", {closeButton: true});
        </script>
    @endif
@endsection