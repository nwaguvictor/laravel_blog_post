@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h3>Dashboard Overview</h3>
        <div class="d-flex flex-wrap">
            {{-- Posts --}}
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="d-flex justify-content-between">
                            <div class="wrapper">
                                <i class="fa fa-list-ol fa-fw fa-2x"></i> <br />
                                <h3>All Posts</h3>
                            </div>
                            <div class="display-3">{{count($posts)}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('posts.index')}}" 
                            class="stretched-link">View more 
                            <i class="fa fa-angle-double-right float-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- User's Posts --}}
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="d-flex justify-content-between">
                            <div class="wrapper">
                                <i class="fa fa-list-ul fa-fw fa-2x"></i> <br />
                                <h3>My Posts</h3>
                            </div>
                            <div class="display-3">{{count(auth()->user()->posts)}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('user.posts', auth()->user()->id)}}" 
                            class="stretched-link">View more 
                            <i class="fa fa-angle-double-right float-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            @if (auth()->user()->isAdmin())
            {{-- Users --}}
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="d-flex justify-content-between">
                            <div class="wrapper">
                                <i class="fa fa-user fa-fw fa-2x"></i> <br />
                                <h3>All Users</h3>
                            </div>
                            <div class="display-3">{{count($users)}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('users.index')}}" class="stretched-link">View more 
                            <i class="fa fa-angle-double-right float-right"></i></a>
                    </div>
                </div>
            </div>


            {{-- Comments --}}
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="d-flex justify-content-between">
                            <div class="wrapper">
                                <i class="fa fa-comments fa-fw fa-2x"></i> <br />
                                <h3>Post Comments</h3>
                            </div>
                            <div class="display-3">{{count($comments)}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="" class="stretched-link">View more 
                            <i class="fa fa-angle-double-right float-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Categories --}}
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="d-flex justify-content-between">
                            <div class="wrapper">
                                <i class="fa fa-list fa-fw fa-2x"></i> <br />
                                <h3>Post Categories</h3>
                            </div>
                            <div class="display-3">{{count($categories)}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('categories.index')}}" class="stretched-link">View more 
                            <i class="fa fa-angle-double-right float-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>    
    
@endsection