@extends('layouts.admin')

@section('title')
    Edit ({{$user->name}})
@endsection

@section('content')
<div class="row my-1">
    <div class=" border-bottom col-md-12 d-flex justify-content align-items-center">
        <h3 class="text-mute">Edit User Form </h3> 
        <a class="btn btn-primary btn-sm m-1 ml-auto" href="{{route('users.index')}}">
            <i class="fa fa-angle-double-left fa-fw"></i>Back
        </a>
    </div>
</div>
{{-- The user registration form --}}

    <div class="row my-2 mx-auto">
        <div class="col-md-6 mx-auto">

            <form class="" action="{{route('users.update', $user->id)}}" method="POST" autocomplete="on">
                {{-- required csrf field --}}
                {{ csrf_field() }}

                {{-- Request Method --}}
                @method('PATCH')

                <div class="form-group @error('name') is-invalid @enderror">
                    <label class="col-form-label" for="name">Name:</label>
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    <input type="text" name="name" class="form-control" placeholder="John Doe" 
                        value="{{old('name') ?? $user->name}}">
                </div>
                <div class="form-group @error('email') is-invalid @enderror">
                    <label class="col-form-label" for="email">E-mail:</label>
                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    <input type="email" name="email" 
                        class="form-control" 
                        placeholder="johndoe@gmail.com" 
                        autocomplete="off"
                        value="{{old('email') ?? $user->email}}">
                </div>
                <div class="form-group @error('status') is-invalid @enderror">
                    <label class="col-form-label" for="status">Status:</label>
                    @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    <select name="status" class="form-control">
                        <option value="1" selected>Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>
                <div class="form-group @error('roles_id') is-invalid @enderror">
                    <label class="col-form-label" for="roles_id">Role:</label>
                    @error('roles_id') <span class="text-danger">{{$message}}</span> @enderror
                    <select name="roles_id" class="form-control">
                        <option value="{{$user->role->id ?? '2'}}" selected>{{$user->role->name ?? 'Choose Role'}}</option>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group @error('password') is-invalid @enderror">
                    <label class="col-form-label" for="password">Password:</label>
                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    <input type="password" name="password" 
                        class="form-control" 
                        placeholder="xxxxxxxx"
                        value="{{old('password') ?? $user->password}}">
                </div>

                {{-- Form buttons (Reset and submit) --}}
                <div class="d-flex">
                    <button type="reset" class="btn btn-danger">
                        <i class="fa fa-times fa-fw"></i>Clear
                    </button>
                    <button type="submit" class="btn btn-primary ml-auto"> 
                        Update User<i class="fa fa-angle-double-right fa-fw"></i>
                    </button>
                </div>
            </form>
@endsection