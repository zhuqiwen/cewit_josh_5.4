<!-- Rank Field -->
<div class="form-group col-sm-12">
    {!! Form::label('rank', 'Rank:') !!}
    {!! Form::text('rank', null, ['class' => 'form-control']) !!}
</div>

<!-- Administrative Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('administrative_title', 'Administrative Title:') !!}
    {!! Form::text('administrative_title', null, ['class' => 'form-control']) !!}
</div>

<!-- School Field -->
<div class="form-group col-sm-12">
    {!! Form::label('school', 'School:') !!}
    {!! Form::text('school', null, ['class' => 'form-control']) !!}
</div>

<!-- School Code Field -->
<div class="form-group col-sm-12">
    {!! Form::label('school_code', 'School Code:') !!}
    {!! Form::text('school_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-12">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::text('department', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Code Field -->
<div class="form-group col-sm-12">
    {!! Form::label('department_code', 'Department Code:') !!}
    {!! Form::text('department_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Campus Code Field -->
<div class="form-group col-sm-12">
    {!! Form::label('campus_code', 'Campus Code:') !!}
    {!! Form::text('campus_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Stem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sTEM', 'Stem:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('sTEM', '1') !!} STEM
    </label>
</div>

<!-- Campus Phone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('campus_phone', 'Campus Phone:') !!}
    {!! Form::text('campus_phone', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctFaculties.index') !!}" class="btn btn-default">Cancel</a>
</div>
