<!-- Student Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    {!! Form::number('student_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Major Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('major_id', 'Major Id:') !!}
    {!! Form::number('major_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctStudentMajors.index') !!}" class="btn btn-default">Cancel</a>
</div>
