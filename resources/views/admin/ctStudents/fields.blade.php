<!-- Contact Info -->

<fieldset>
    <legend>Contact Information</legend>
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
    {!! Form::email('contact[email]', null, ['class' => 'form-control']) !!}
</div>

<!-- IU Username -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[iu_username]', 'IU Username:') !!}
    {!! Form::text('contact[iu_username]', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[gender]', 'Gender:') !!}
    {!! Form::select('contact[gender]', ['f' => 'Female', 'm' => 'Male', 'u' => 'Unknown'], null, ['class' => 'form-control']) !!}
</div>

<!-- Join Date -->
<div class="form-group col-lg-4 col-md-6 col-sm-12">
    {!! Form::label('contact[join_date]', 'Join Date:') !!}
    {!! Form::date('contact[join_date]', null, ['class' => 'form-control']) !!}
</div>
</fieldset>


<!--  /END Contact Info -->

<fieldset>
    <legend>Academic Information</legend>
<!-- School Field -->
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    {!! Form::label('school', 'School:') !!}
    {!! Form::select('school', $schools, null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Career Field -->
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    {!! Form::label('academic_career', 'Academic Career:') !!}
    {!! Form::select('academic_career', $academic_careers, null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Standing Field -->
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    {!! Form::label('academic_standing', 'Academic Standing:') !!}
    {!! Form::select('academic_standing', $academic_standings, null, ['class' => 'form-control']) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    {!! Form::label('ethnicity', 'Ethnicity:') !!}
    {!! Form::select('ethnicity',$ethnicities , null, ['class' => 'form-control']) !!}
</div>
</fieldset>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    <?php
        if(Request::route()->getName() == 'admin.ctStudents.edit')
        {
            $save_button_name = 'Update';
        }
        else
        {
            $save_button_name = 'Create';
        }
    ?>
    {!! Form::submit($save_button_name, ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctStudents.index') !!}" class="btn btn-default">Cancel</a>
</div>
