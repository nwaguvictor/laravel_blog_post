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
                        <h6>-- {{$comment->user->name ?? 'Anonymous'}}</h6>
                        <h5>{{$comment->message}}</h5>
                    </div> 
                </div>

            <?php 
                if($cnt == 10) {break;}
                $cnt++;  
            }} else {
                echo '<p class="text-center text-info">Be the first to drop a comment</p>';
       
            }?>

          
        <div class="m-5 shadow p-3">
            <form action="" method="POST" class="form">
                <div class="form-group">
                    <textarea name="message"
                        class="form-control" 
                        cols="30" rows="6" 
                        placeholder="Leave a comment..."
                    >{{old('message')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection