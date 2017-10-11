<table class="table table-responsive" id="ctFaculties-table">
    <thead>
     <tr>
        <th>Rank</th>
        <th>Administrative Title</th>
        <th>School</th>
        <th>School Code</th>
        <th>Department</th>
        <th>Department Code</th>
        <th>Campus Code</th>
        <th>Stem</th>
        <th>Campus Phone</th>
        <th>Contact Id</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($ctFaculties as $ctFaculty)
        <tr>
            <td>{!! $ctFaculty->rank !!}</td>
            <td>{!! $ctFaculty->administrative_title !!}</td>
            <td>{!! $ctFaculty->school !!}</td>
            <td>{!! $ctFaculty->school_code !!}</td>
            <td>{!! $ctFaculty->department !!}</td>
            <td>{!! $ctFaculty->department_code !!}</td>
            <td>{!! $ctFaculty->campus_code !!}</td>
            
<td>@if($ctFaculty->sTEM =='1') true @else false @endif</td>


            <td>{!! $ctFaculty->campus_phone !!}</td>
            <td>{!! $ctFaculty->contact_id !!}</td>
            <td>
                 <a href="{{ route('admin.ctFaculties.show', $ctFaculty->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctFaculty"></i>
                 </a>
                 <a href="{{ route('admin.ctFaculties.edit', $ctFaculty->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctFaculty"></i>
                 </a>
                 <a href="{{ route('admin.ctFaculties.confirm-delete', $ctFaculty->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctFaculty"></i>
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