

<div style="display: flex; gap: 1rem; flex-direction: row">
    <div style="width: 60%">

    {!! Form::text("name", null, ["placeholder" => "Název"]) !!}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    {!! Form::text("no", null, ["placeholder" => "Číslo"]) !!}
    @error('no')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    {!! Form::text("phone", null, ["placeholder" => "Telefon"]) !!}
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    


        {!! Form::button("Submit", ["type" => "submit", "class" => "btn btn-primary"]) !!}


    </div>
</div>


