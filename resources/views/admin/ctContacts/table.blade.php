<table class="table table-responsive" id="ctContacts-table">
    <thead>
     <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Iu Username</th>
        <th>Gender</th>
        <th>Join Date</th>
        <th>Is Active</th>
        <th>Is Affiliate</th>
        <th>Is Test</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($ctContacts as $ctContact)
        <tr>
            <td>{!! $ctContact->first_name !!}</td>
            <td>{!! $ctContact->last_name !!}</td>
            <td>{!! $ctContact->email !!}</td>
            <td>{!! $ctContact->iu_username !!}</td>
            <td>{!! $ctContact->gender !!}</td>
            <td>{!! $ctContact->join_date !!}</td>
            
<td>@if($ctContact->is_active =='1') true @else false @endif</td>


            
<td>@if($ctContact->is_affiliate =='1') true @else false @endif</td>


            
<td>@if($ctContact->is_test =='1') true @else false @endif</td>


            <td>
                 <a href="{{ route('admin.ctContacts.show', $ctContact->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctContact"></i>
                 </a>
                 <a href="{{ route('admin.ctContacts.edit', $ctContact->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctContact"></i>
                 </a>
                 <a href="{{ route('admin.ctContacts.confirm-delete', $ctContact->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctContact"></i>
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