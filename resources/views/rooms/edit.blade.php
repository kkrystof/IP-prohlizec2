
@extends('master')
@section('title', $title)

@section('content')

<section class="container">

    @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

    {!! Form::model($room, ["url" => ["room", $room->room_id], "method" => "put", "class" => "form"]) !!}
        @include('rooms.form')
    {!! Form::close() !!}


</section>

@endsection
