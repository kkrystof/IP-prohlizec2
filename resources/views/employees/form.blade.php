

<div style="display: flex; gap: 1rem; flex-direction: row">
    <div style="width: 60%">

    {!! Form::text("name", null, ["placeholder" => "Firstname"]) !!}
    {!! Form::text("surname", null, ["placeholder" => "Surname"]) !!}
    {!! Form::text("job", null, ["placeholder" => "Job"]) !!}
    {!! Form::text("wage", null, ["placeholder" => "Wage"]) !!}

{{--    {!! Form::text("room", null, ["placeholder" => "His room"]) !!}--}}
        {!! Form::select('room',  $room_categories, $room_id=  $employee->room_id ?? 1, ['class' => 'form-control']) !!}


        {!! Form::button("Submit", ["type" => "submit", "class" => "btn btn-primary"]) !!}


    </div>
   <div style="width: max-content">
        <h3>Keys</h3>
        @foreach($rooms as $room)
        <label>
            {!! Form::checkbox("rooms[]", $room->room_id) !!}
            {{$room->name}}
        </label>
        @endforeach
    </div>
</div>


