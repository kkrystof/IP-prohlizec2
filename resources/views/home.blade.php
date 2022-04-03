
@extends('master')
@section('title', "Home")

@section('content')



    <div class="container">
        @auth
            {{((Auth::user()->is_admin) ? 'Admin učet' : '')}}
            <h1>Homepage</h1>
            <br>
            <a href={{url('/room')}}>Místnosti -></a>
            <a href={{url('/employee')}}>Zaměstnanci -></a>
        
        @endauth
            
        @guest
            <h1>Pro přístup je potřeba autorizace!</h1>
            {{-- <a href={{url('/login')}}>Login</a> --}}
        @endguest
    </div>

@endsection
