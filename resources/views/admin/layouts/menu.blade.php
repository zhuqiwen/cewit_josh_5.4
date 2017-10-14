@if(env('APP_DEBUG'))
<li class="{{ Request::is('ctContacts*') ? 'active' : '' }}">
    <a href="{!! route('admin.ctContacts.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               CtContacts
    </a>
</li>
@endif

<li class="{{ Request::is('ctStudents*') ? 'active' : '' }}">
    <a href="{!! route('admin.ctStudents.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               CtStudents
    </a>
</li>

<li class="{{ Request::is('ctFaculties*') ? 'active' : '' }}">
    <a href="{!! route('admin.ctFaculties.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               CtFaculties
    </a>
</li>

<li class="{{ Request::is('ctMajors*') ? 'active' : '' }}">
    <a href="{!! route('admin.ctMajors.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               CtMajors
    </a>
</li>

@if(env('APP_DEBUG'))
<li class="{{ Request::is('ctStudentMajors*') ? 'active' : '' }}">
    <a href="{!! route('admin.ctStudentMajors.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               CtStudentMajors
    </a>
</li>
@endif
<li class="{{ Route::is('admin.dataImport*') ? 'active' : '' }}">
    <a href="{!! route('admin.dataImport.index') !!}">
        <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
           data-loop="true"></i>
        Data Import
    </a>
</li>

