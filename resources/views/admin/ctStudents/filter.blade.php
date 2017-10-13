{!! Form::open(['route' => 'admin.ctStudents.filter', 'method' => 'get']) !!}

<!-- Contact Fields -->
<!-- First Name -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['m' => 'Male', 'f' => 'Female', 'u' => 'Unknown'], null, ['class' => 'form-control', 'placeholder' => 'Gender']) !!}
</div>

<!-- IU Account -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('iu_username', 'IU Account') !!}
    {!! Form::text('iu_username', null, ['class' => 'form-control']) !!}
</div>

<!-- Join Date -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('join_date', 'Join Date:') !!}
    {!! Form::date('join_date', null, ['class' => 'form-control']) !!}
</div>

<!-- /End Contact Info -->



<!-- Student Info -->
<!-- School Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('school', 'School:') !!}
    {!! Form::select('school', $schools, null, ['class' => 'form-control', 'placeholder' => 'School']) !!}
</div>

<!-- Academic Career Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('academic_career', 'Academic Career:') !!}
    {!! Form::select('academic_career', $academic_careers, null, ['class' => 'form-control', 'placeholder' => 'Career']) !!}
</div>

<!-- Academic Standing Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('academic_standing', 'Academic Standing:') !!}
    {!! Form::select('academic_standing', $academic_standings, null, ['class' => 'form-control', 'placeholder' => 'Standing']) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('ethnicity', 'Ethnicity:') !!}
    {!! Form::select('ethnicity', $ethnicities, null, ['class' => 'form-control', 'placeholder' => 'Ethnicity']) !!}
</div>

<!-- /End Student Info -->

<!-- Major Type -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('major_type', 'Major Type:') !!}
    {!! Form::select('major_type', ['stem' => 'STEM', 'non_stem' => 'Non STEM'], null, ['class' => 'form-control', 'placeholder' => 'Major Type']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-md-1 col-sm-6 text-center">
    {!! Form::label('', '') !!}

    {!! Form::submit('Apply', ['class' => 'btn btn-primary form-control']) !!}
</div>
<div class="form-group col-md-1 col-sm-6 text-center">
    {!! Form::label('', '') !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-default form-control']) !!}
</div>

{!! Form::close() !!}