<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ctFaculty->id !!}</p>
    <hr>
</div>

<!-- Rank Field -->
<div class="form-group">
    {!! Form::label('rank', 'Rank:') !!}
    <p>{!! $ctFaculty->rank !!}</p>
    <hr>
</div>

<!-- Administrative Title Field -->
<div class="form-group">
    {!! Form::label('administrative_title', 'Administrative Title:') !!}
    <p>{!! $ctFaculty->administrative_title !!}</p>
    <hr>
</div>

<!-- School Field -->
<div class="form-group">
    {!! Form::label('school', 'School:') !!}
    <p>{!! $ctFaculty->school !!}</p>
    <hr>
</div>

<!-- School Code Field -->
<div class="form-group">
    {!! Form::label('school_code', 'School Code:') !!}
    <p>{!! $ctFaculty->school_code !!}</p>
    <hr>
</div>

<!-- Department Field -->
<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    <p>{!! $ctFaculty->department !!}</p>
    <hr>
</div>

<!-- Department Code Field -->
<div class="form-group">
    {!! Form::label('department_code', 'Department Code:') !!}
    <p>{!! $ctFaculty->department_code !!}</p>
    <hr>
</div>

<!-- Campus Code Field -->
<div class="form-group">
    {!! Form::label('campus_code', 'Campus Code:') !!}
    <p>{!! $ctFaculty->campus_code !!}</p>
    <hr>
</div>

<!-- Stem Field -->
<div class="form-group">
    {!! Form::label('sTEM', 'Stem:') !!}
    <p>@if( $ctFaculty->sTEM  =='1') true @else false @endif</p>
    <hr>
</div>

<!-- Campus Phone Field -->
<div class="form-group">
    {!! Form::label('campus_phone', 'Campus Phone:') !!}
    <p>{!! $ctFaculty->campus_phone !!}</p>
    <hr>
</div>

<!-- Contact Id Field -->
<div class="form-group">
    {!! Form::label('contact_id', 'Contact Id:') !!}
    <p>{!! $ctFaculty->contact_id !!}</p>
    <hr>
</div>

