<table class="table table-responsive" id="ctStudentMajors-table">
    <thead>
     <tr>
        <th>Student Id</th>
        <th>Major Id</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($ctStudentMajors as $ctStudentMajor)
        <tr>
            <td>{!! $ctStudentMajor->student_id !!}</td>
            <td>{!! $ctStudentMajor->major_id !!}</td>
            <td>
                 <a href="{{ route('admin.ctStudentMajors.show', $ctStudentMajor->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctStudentMajor"></i>
                 </a>
                 <a href="{{ route('admin.ctStudentMajors.edit', $ctStudentMajor->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctStudentMajor"></i>
                 </a>
                 <a href="{{ route('admin.ctStudentMajors.confirm-delete', $ctStudentMajor->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctStudentMajor"></i>
                 </a>
            </td>
        </tr>
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
@stop