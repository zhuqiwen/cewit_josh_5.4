<table class="table table-responsive" id="ctStudents-table">
    <thead>
     <tr>
        <th>Contact Id</th>
        <th>School</th>
        <th>Academic Career</th>
        <th>Academic Standing</th>
        <th>Ethnicity</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($ctStudents as $ctStudent)
        <tr>
            <td>{!! $ctStudent->contact_id !!}</td>
            <td>{!! $ctStudent->school !!}</td>
            <td>{!! $ctStudent->academic_career !!}</td>
            <td>{!! $ctStudent->academic_standing !!}</td>
            <td>{!! $ctStudent->ethnicity !!}</td>
            <td>
                 <a href="{{ route('admin.ctStudents.show', $ctStudent->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctStudent"></i>
                 </a>
                 <a href="{{ route('admin.ctStudents.edit', $ctStudent->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctStudent"></i>
                 </a>
                 <a href="{{ route('admin.ctStudents.confirm-delete', $ctStudent->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctStudent"></i>
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