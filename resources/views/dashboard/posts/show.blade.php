@extends('layouts.dashboard')

@section('title')
    Post ({{Str::limit($post->title, 20)}})
@endsection

@section('content')
    <div class="row my-2 border-bottom d-flex">
        <h4 class="align-self-center">Post Details</h4>
        <a href="{{route('posts.index')}}" class="ml-auto btn btn-sm btn-primary mb-2">
            <i class="fa fa-angle-double-left fa-fw"></i>Back
        </a>
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
            <h3>{{$post->title}}</h3>
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