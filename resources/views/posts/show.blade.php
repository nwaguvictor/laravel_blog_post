@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('title')
    Post ({{Str::limit($post->title, 20)}})
@endsection

@section('content')
<div class="container">
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

    <hr>

    <div class="comments">
        <h4>Comments:</h4>
        <?php
            if (count($post->comments) > 0) {
                $cnt = 1;
                foreach ($post->comments as $comment) { ?>
           
                <div class="card my-3">
                    <div class="card-body">

                        @can('delete', $comment)
                            <section class="float-right">
                                <form action="{{route('comments.destroy', $comment->id)}}" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </section>
                        @endcan
                        
                        <h6>-- {{$comment->user->name ?? 'Anonymous'}}</h6>
                        <h5>{{$comment->message}}</h5>
                    </div> 
                </div>

            <?php $cnt++; }} else {
                echo '<p class="text-center text-info">Be the first to drop a comment</p>';
            }?>

          
        <div class="m-5 shadow p-3">
            <form action="{{route('comments.store')}}" method="POST" class="form">
                @csrf
                @error('message') <span class="text-danger">{{$message}}</span> @enderror
                <div class="form-group @error('message') is-invalid @enderror">
                    <textarea name="message"
                        class="form-control" 
                        cols="30" rows="5" 
                        placeholder="Leave a comment..."
                    >{{old('message')}}</textarea>
                </div>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @if (session('create'))
        <script>
            toastr.success("{{session('create')}}");
        </script>
    @endif

    @if (session('delete'))
        <script>
            toastr.success("{{session('delete')}}");
        </script>
    @endif
@endsection