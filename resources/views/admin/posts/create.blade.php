@extends('layouts.admin')

@section('title')
    Create Post
@endsection

@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">Create a Post</h4>
                <a class="btn btn-primary btn-sm ml-auto my-1" href="{{route('posts.index')}}">
                    <i class="fa fa-angle-double-left fa-fw"></i>Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{route('posts.store')}}" method="POST" class="form" enctype="multipart/form-data">
                    {{-- Csrf field is required for making form request --}}
                    {{ csrf_field() }}

                    <div class="form-group @error('title') is-invalid @enderror">
                        <label for="title" class="col-form-label">Post Title:</label>
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                        <input type="text" name="title" 
                            class="form-control" 
                            placeholder="Post Title"
                            value="{{old('title')}}">
                    </div>
                    <div class="form-group @error('body') is-invalid @enderror">
                        <label for="body" class="col-form-label">Post Content:</label>
                        @error('body') <span class="text-danger">{{$message}}</span> @enderror
                        <textarea name="body" 
                            cols="30" rows="6" class="form-control" 
                            placeholder="Enter content">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group @error('category_id') is-invalid @enderror">
                        <label for="category_id" class="col-form-label">Post Category:</label>
                        @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                        <select name="category_id" class="form-control">
                            <option disabled selected>Select Category</option>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option> 
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-form-label">Post Image:</label>
                        <input type="file" class="form-control p-1" name="image">
                    </div>
                    <div class="d-flex">
                        <button type="reset" class="btn btn-danger">
                            <i class="fa fa-times fa-fw"></i>Clear
                        </button>
                        <button type="submit" class="btn btn-primary ml-auto">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection