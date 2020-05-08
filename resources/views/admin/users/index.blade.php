@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
<div class="row my-2">
    <div class="col-md-12">
        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">
           <i class="fa fa-plus fa-fw"></i>Add User
        </a>
        <span class="text-mute"><i class="fa fa-info fa-fw"></i>Create a new User</span>
    </div>
</div>

@if (session()->has('delete'))
    {{session('delete')}}
@endif
<div class="row my-2">
    <div class="col-md-12">
        @if (count($users) > 0)
            <div class="table reaposive">
                <table class="table stripe table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Last Edited</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name ?? 'No Role'}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('users.show', $user->id)}}">View User</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="text-mute">No Users. Click the add button to <q>Add</q> a user</h2>
        @endif
    </div>
</div>
@endsection