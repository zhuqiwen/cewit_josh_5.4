<!-- Contact Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contact_id', 'Contact Id:') !!}
    {!! Form::number('contact_id', null, ['class' => 'form-control']) !!}
</div>

<!-- School Field -->
<div class="form-group col-sm-12">
    {!! Form::label('school', 'School:') !!}
    {!! Form::text('school', null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Career Field -->
<div class="form-group col-sm-12">
    {!! Form::label('academic_career', 'Academic Career:') !!}
    {!! Form::text('academic_career', null, ['class' => 'form-control']) !!}
</div>

<!-- Academic Standing Field -->
<div class="form-group col-sm-12">
    {!! Form::label('academic_standing', 'Academic Standing:') !!}
    {!! Form::text('academic_standing', null, ['class' => 'form-control']) !!}
</div>

<!-- Ethnicity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ethnicity', 'Ethnicity:') !!}
    {!! Form::text('ethnicity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctStudents.index') !!}" class="btn btn-default">Cancel</a>
</div>
