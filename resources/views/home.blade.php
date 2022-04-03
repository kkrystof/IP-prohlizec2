
@extends('master')
@section('title', "Home")

@section('content')



    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. <b>Please login to view the restricted data.</b></p>
            <a href={{url('/login')}}>Login</a>
        @endguest
    </div>

@endsection