@extends('layouts.dashboard')

@section('title')
    Categories
@endsection

@section('content')
    <div class="border-bottom">
        <h5 class="align-self-center">Categories Section</h5>
    </div>

    {{-- adding Categories form --}}
    <div class="row my-3">
        <div class="col-md-5 my-2">
            <h6 class="text-mute">Adding a Category</h6>

            {{-- Session flash back messages --}}
            @if (session()->has('added'))
                <p>{{session('added')}}</p>
            @endif
            @if (session()->has('delete'))
                <p>{{session('delete')}}</p>
            @endif
            @if (session()->has('update'))
                <p>{{session('update')}}</p>
            @endif

            {{-- Category form --}}
            <form action="{{route('categories.store')}}" method="POST" class="form">
                {{-- Csrf field --}}
                {{ csrf_field() }}

                @error('name') <h6 class="text-danger d-flex jus">{{$message}}</h6> @enderror
                <div class="input-group @error('name') is-invalid @enderror">
                    <input type="text" name="name" class="form-control" placeholder="World">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-plus fa-fw"></i></button>
                    </div>
                </div>
            </form>
    
        </div>

        <div class="col-md-7">
            <h6 class="text-mute">Category List</h6>
            
            @if (count($categories) > 0)
            <div class="table responsive">
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Post Counts</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>
                                        <a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a>
                                    </td>
                                    <td>{{count($category->posts)}}</td>
                                    <td>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-danger">Category list is Empty, add a category</h3>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection