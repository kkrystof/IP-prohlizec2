
@extends('master')
@section('title', $room->name)

@section('content')

<section class="container">

    <h1>Karta mista - {{$room->name}}</h1>

    <dl>
        @foreach($table as $key => $row)
            @if ($key === 'employees' || $key === 'keys')
                <dt>{{$row}}</dt>
                @foreach ($room->$key as $employee)
                    <dd><a href={{url("/employee/{$employee->employee_id}")}}>{{$employee->name . " " . $employee->surname}}</a></dd>
                @endforeach
            @else
                <dt>{{$row}}</dt><dd>{{($room->$key ?: '-')}}</dd>
            @endif
        @endforeach
    </dl>

</section>

@endsection
