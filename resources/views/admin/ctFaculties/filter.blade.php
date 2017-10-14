{!! Form::open(['route' => 'admin.ctFaculties.filter', 'method' => 'get']) !!}

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



<!-- Faculty Info -->
<!-- School Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('school', 'School:') !!}
    {!! Form::select('school', $schools, null, ['class' => 'form-control', 'placeholder' => 'School']) !!}
</div>

<!-- Rank Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('rank', 'Rank:') !!}
    {!! Form::select('rank', $ranks, null, ['class' => 'form-control', 'placeholder' => 'Rank']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::select('department', $departments, null, ['class' => 'form-control', 'placeholder' => 'Department']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('administrative_title', 'Title:') !!}
    {!! Form::select('administrative_title', $administrative_titles, null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
</div>


<!-- Stem -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('stem', 'STEM:') !!}
    {!! Form::select('stem', ['yes' => 'Yes', 'no' => 'No'], null, ['class' => 'form-control', 'placeholder' => 'STEM']) !!}
</div>

<!-- /End Faculty Info -->


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