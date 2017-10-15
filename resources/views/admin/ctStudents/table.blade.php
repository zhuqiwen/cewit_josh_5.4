<table class="table table-responsive" id="ctStudents-table">
    <thead>
     <tr>
        <th></th>
        <th>Contact Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>IU Account</th>
        <th>Gender</th>
        <th>Join Date</th>
        {{--<th>School</th>--}}
        {{--<th>Academic Career</th>--}}
        {{--<th>Academic Standing</th>--}}
        {{--<th>Ethnicity</th>--}}
        <th colspan="2">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($ctStudents as $ctStudent)
        <tr>
            @include('admin.common.arrow_to_display_child_row')
            <td>{!! $ctStudent->contact_id !!}</td>
            <td>{!! $ctStudent->contact->first_name !!}</td>
            <td>{!! $ctStudent->contact->last_name !!}</td>
            <td>{!! $ctStudent->contact->email !!}</td>
            <td>{!! $ctStudent->contact->iu_username !!}</td>
            <td>{!! $ctStudent->contact->gender !!}</td>
            <td>{!! $ctStudent->contact->join_date !!}</td>

            <td>
                 <a href="{{ route('admin.ctStudents.show', $ctStudent->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctStudent"></i>
                 </a>
                 <a href="{{ route('admin.ctStudents.edit', $ctStudent->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctStudent"></i>
                 </a>
                @if(env('APP_DEBUG'))
                 {{--<a href="{{ route('admin.ctStudents.confirm-delete', $ctStudent->id) }}" data-toggle="modal" data-target="#delete_confirm">--}}
                     {{--<i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctStudent"></i>--}}
                 {{--</a>--}}
                @endif
            </td>
        </tr>
        @include('admin.ctStudents.child_row')

    @endforeach
    </tbody>
</table>


@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
    <script src="{{ asset('assets/js/common/child_row.js') }}" ></script>

    <script src="{{ asset('assets/js/ct_student/index.js') }}" ></script>
@stop