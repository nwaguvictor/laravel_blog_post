@extends('layouts.dashboard')

@section('title')
    Edit ({{$category->name}})
@endsection

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">Eidt {{$category->name}}</h4>
                <a class="btn btn-primary btn-sm my-2 ml-auto" href="{{route('categories.index')}}">
                    <i class="fa fa-angle-double-left fa-fw"></i>Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{route('categories.update', $category->id)}}" method="POST" class="form">
                    {{-- Csrf field --}}
                    {{ csrf_field() }}
                    @method('PATCH')
    
                    @error('name') <h6 class="text-danger d-flex jus">{{$message}}</h6> @enderror
                    <div class="form-input @error('name') is-invalid @enderror">
                        <label for="name" class="col-form-label">Category Name:</label>
                        <input type="text" name="name" 
                            class="form-control" 
                            placeholder="World" 
                            value="{{$category->name}}">  
                    </div>

                    <div class="d-flex my-3">
                        <button type="reset" class="btn btn-danger">
                            <i class="fa fa-times fa-fw"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary ml-auto">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
            {{-- <div class="card-footer">
                
            </div> --}}
        </div>
    </div>
@endsection