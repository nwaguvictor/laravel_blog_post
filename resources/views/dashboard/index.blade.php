@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h3>Hello! {{auth()->user()->name}}, Welcome onBoard</h3>
        <div class="row">
            {{-- Users --}}
            <div class="col-sm-4 p-2">
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
                        <a href="" class="stretched-link">View more <i class="fa fa-angle-double-right float-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Posts --}}
            <div class="col-sm-4 p-2">
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
                        <a href="" class="stretched-link">View more <i class="fa fa-angle-double-right float-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Comments --}}
            <div class="col-sm-4 p-2">
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
                        <a href="" class="stretched-link">View more <i class="fa fa-angle-double-right float-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
@endsection