


@extends('master')
@section('title', 'Zamestnanci')

@section('content')

<section class="container">


    <div class="flex-left" style="align-items: center">
        <div class="unit"><h1>Seznam zaměstnanců</h1></div>
        <div class="unit-0" style="width:100px; margin: auto;"><a href={{url("/employee/create")}} class="btn btn-primary" @if(!(Auth::user()->is_admin)) disabled @endif>New</a></div>
      </div>

    <table class="table">
        <thead>
        <tr>
            @foreach ($table as $key => $column)
            <th>
                {{$column}}
                <a href={{url("/employee?order={$key}&direction=up")}} class="arrow">🔽</a>
                <a href={{url("/employee?order={$key}&direction=down")}} class="arrow">🔼</a>
            </th>
            @endforeach
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($table as $key => $column)
                        <td>
                            @if ($key === "name")
                                <a href={{url("/employee/{$row->employee_id}")}}>{{$row->name . " ". $row->surname}}</a>
                            @else
                                {{$row->$key}}
                            @endif
                        </td>
                    @endforeach
                    <td><a href={{url("/employee/{$row->employee_id}/edit")}} class="btn" @if(!(Auth::user()->is_admin)) disabled @endif>Edit</a></td>

                    <td>



{{--                        <a href="{{ url('items/'.$row->id.'/edit') }}">Edit</a> |--}}
                        {{ Form::open(["url" => 'employee/' . $row->employee_id, 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger" @if(!(Auth::user()->is_admin)) disabled @endif>Delete</button>
                        {{ Form::close() }}






                    </td>
                </tr>
            @endforeach
            <tr>
            </tr>
        </tbody>
    </table>

</section>

@endsection

