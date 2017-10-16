{!! Form::open(['route' => ['admin.ctStudents.export', 'csv'], 'method' => 'get', 'id' => 'export_form']) !!}

<!-- Contact Fields -->
<!-- First Name -->
    {!! Form::hidden('first_name', Request::input('first_name')) !!}

<!-- Last Name -->
    {!! Form::hidden('last_name', Request::input('last_name')) !!}

<!-- Email -->
    {!! Form::hidden('email', Request::input('email')) !!}

<!-- Gender -->
    {!! Form::hidden('gender', Request::input('gender')) !!}

<!-- IU Account -->
    {!! Form::hidden('iu_username', Request::input('iu_username')) !!}

<!-- Join Date -->
    {!! Form::hidden('join_date', Request::input('join_date')) !!}

<!-- /End Contact Info -->



<!-- Student Info -->
<!-- School Field -->
    {!! Form::hidden('school', Request::input('school')) !!}

<!-- Academic Career Field -->
    {!! Form::hidden('academic_career', Request::input('academic_career')) !!}

<!-- Academic Standing Field -->
    {!! Form::hidden('academic_standing', Request::input('academic_standing')) !!}

<!-- Ethnicity Field -->
    {!! Form::hidden('ethnicity', Request::input('ethnicity')) !!}

<!-- /End Student Info -->

<!-- Major Type -->
    {!! Form::hidden('major_type', Request::input('major_type')) !!}

{!! Form::close() !!}