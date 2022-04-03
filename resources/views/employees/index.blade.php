


@extends('master')
@section('title', 'Zamestnanci')

@section('content')

<section class="container">


    <div class="flex-left" style="align-items: center">
        <div class="unit"><h1>Seznam zaměstnanců</h1></div>
        <div class="unit-0" style="width:100px; margin: auto;"><a href={{url("/employee/create")}} class="btn btn-primary">New</a>        </div>
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
                    <td><a href={{url("/employee/{$row->employee_id}/edit")}} class="btn">Edit</a></td>

                    <td>



{{--                        <a href="{{ url('items/'.$row->id.'/edit') }}">Edit</a> |--}}
                        {{ Form::open(["url" => 'employee/' . $row->employee_id, 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{ Form::close() }}


{{--                        <a href={{url("/employee/{$row->employee_id}/delete")}} class="btn btn-danger">Delete</a>--}}




{{--                        <a href="tasks/{{$task->id}}" class="btn btn-danger" onclick="--}}
{{--                var result = confirm('Are you sure you want to delete this record?');--}}
{{--                --}}
{{--                if(result){--}}
{{--                    event.preventDefault();--}}
{{--                    document.getElementById('delete-form').submit();--}}
{{--                }">--}}
{{--                            Delete--}}
{{--                        </a>--}}

{{--                        <form method="POST" id="delete-form" action="{{route('tasks.destroy', [$task->id])}}">--}}
{{--                            {{csrf_field()}}--}}
{{--                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                        </form>--}}


{{--                        {!! Form::button("Delete", ["type" => "submit", "class" => "btn btn-primary"]) !!}--}}


                    </td>
                </tr>
            @endforeach
            <tr>
            </tr>
        </tbody>
    </table>

</section>

@endsection

