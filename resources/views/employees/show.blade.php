
@extends('master')
@section('title', $employee->name)

@section('content')

<section class="container">

    <h1>Karta osoby - {{$employee->name . " " . $employee->surname}}</h1>

    <dl>
        @foreach($table as $key => $row)
            @if ($key === 'keys')
                <dt>{{$row}}</dt>
                @foreach ($employee->rooms as $room)
                    <dd><a href={{url("/room/{$room->room_id}")}}>{{$room->name}}</a></dd>
                @endforeach
            @else
                <dt>{{$row}}</dt><dd>{{$employee->$key}}</dd>
            @endif
        @endforeach
    </dl>

</section>

@endsection
