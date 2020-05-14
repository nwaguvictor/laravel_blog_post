@extends('layouts.dashboard')
@section('title')
    User ({{$user->name}})
@endsection

@section('content')
    <div class="d-flex justify-content-center border-bottom">
        <h4 class="text-mute">
            {{$user->name}} Details
        </h4>
        <a href="{{route('users.index')}}" class="ml-auto btn btn-sm btn-primary my-1">
            <i class="fa fa-angle-double-left fa-fw"></i>Back
        </a>
    </div>
    <div class="row my-2">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name}}</h3>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    <p><strong>Full Name: </strong>{{$user->name}}</p>
                    <p><strong>E-mail: </strong>{{$user->email}}</p>
                    <p><strong>Status: </strong>{{$user->status}}</p>
                    <p><strong>Role: </strong>{{$user->role->name ?? 'No Role'}}</p>
                    <p><strong>Posts: </strong>{{count($user->posts)}}</p>
                    <p><strong>Date Joined: </strong>{{$user->created_at->diffForHumans()}}</p>
                    <p><strong>Last Updated: </strong>{{$user->updated_at->diffForHumans()}}</p>
                </div>
                {{-- card footer section --}}
                <div class="card-footer">
                    <div class="d-flex">
                        {{-- Edit route link --}}
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-secondary">
                            <i class="fa fa-edit fa-fw"></i>Edit
                        </a>

                        {{-- Delete route link --}}
                        <form class="form ml-auto" action="{{route('users.destroy', $user->id)}}" method="POST">
                            {{-- required csrf field --}}
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-times fa-fw"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('scripts')
    @if (session()->has('update'))
        <script>
            toastr.success("{{session('update')}}", {closeButton: true});
        </script>
    @endif
@endsection

