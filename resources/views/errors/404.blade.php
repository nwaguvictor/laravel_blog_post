@extends('layouts.app')

<style>
    section.container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 50vh;
    }
</style>

@section('content')
    <section class="container">
        <h4 class="text-danger">404 | Sorry!.</h4>
        <h4 class="text-danger">This page is forbidden</h4>
        <a class="btn btn-success" href="/">
            <i class="fa fa-angle-double-left fa-fw"></i>Go Back Home
        </a>
    </section>
@endsection