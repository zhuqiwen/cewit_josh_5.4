<!-- Contact Info -->
<!-- First Name -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[first_name]', 'First Name:') !!}
    {!! Form::text('contact[first_name]', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[last_name]', 'Last Name:') !!}
    {!! Form::text('contact[last_name]', null, ['class' => 'form-control']) !!}
</div>

<!-- Email -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[email]', 'Email:') !!}
    {!! Form::text('contact[email]', null, ['class' => 'form-control']) !!}
</div>

<!-- IU Username -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[iu_username]', 'First Name:') !!}
    {!! Form::text('contact[iu_username]', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[gender]', 'Gender:') !!}
    {!! Form::text('contact[gender]', null, ['class' => 'form-control']) !!}
</div>

<!-- Join Date -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[join_date]', 'Join Date:') !!}
    {!! Form::text('contact[join_date]', null, ['class' => 'form-control']) !!}
</div>


<!--  /END Contact Info -->


<!-- School Field -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('school', 'School:') !!}
    {!! Form::text('school', null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Career Field -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('academic_career', 'Academic Career:') !!}
    {!! Form::text('academic_career', null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Standing Field -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('academic_standing', 'Academic Standing:') !!}
    {!! Form::text('academic_standing', null, ['class' => 'form-control']) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('ethnicity', 'Ethnicity:') !!}
    {!! Form::text('ethnicity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-lg-4 col-md-6 col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctStudents.index') !!}" class="btn btn-default">Cancel</a>
</div>
