{!! Form::open(['route' => 'admin.ctMajors.filter', 'method' => 'get']) !!}

<!-- major -->
<div class="form-group col-md-5 col-sm-6">
    {!! Form::label('major', 'Major:') !!}
    {!! Form::text('major', null, ['class' => 'form-control']) !!}
</div>

<!-- type -->
<div class="form-group col-md-5 col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['stem' => 'STEM', 'non-stem' => 'Non STEM', 'unknown' => 'Unknown'], null, ['class' => 'form-control', 'placeholder' => 'Type']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-md-1 col-sm-6 text-center">
    {!! Form::label('', '----') !!}

    {!! Form::submit('Apply', ['class' => 'btn btn-primary form-control']) !!}
</div>
<div class="form-group col-md-1 col-sm-6 text-center">
    {!! Form::label('', '----') !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-default form-control']) !!}
</div>

{!! Form::close() !!}