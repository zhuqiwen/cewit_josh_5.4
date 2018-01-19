{!! Form::open(['route' => ['admin.ctFaculties.export', 'csv'], 'method' => 'get', 'id' => 'export_form']) !!}

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



<!-- Faculty Info -->

<!-- School Field -->
{!! Form::hidden('school', Request::input('school')) !!}

<!-- Rank Field -->
{!! Form::hidden('rank', Request::input('rank')) !!}

<!-- Department Field -->
{!! Form::hidden('department', Request::input('department')) !!}

<!-- administrative_title Field -->
{!! Form::hidden('administrative_title', Request::input('administrative_title')) !!}


<!-- stem Type -->
{!! Form::hidden('stem', Request::input('stem')) !!}


<!-- /End Faculty Info -->

{!! Form::close() !!}