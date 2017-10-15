<table class="table table-responsive" id="ctFaculties-table">
    <thead>
    <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Join Date</th>
        <th>Stem</th>
        <th>Campus Phone</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ctFaculties as $ctFaculty)
        <tr class="parent_row">
            <td class="caret-more-details" style="width: 2%">
                <i class="livicon" data-name="caret-right" data-size="20" data-color="#000"></i>
                <i class="livicon" data-name="caret-down" data-size="20" data-color="#000" style="display: none;"></i>
            </td>
            <td>{!! $ctFaculty->contact->first_name !!} {!! $ctFaculty->contact->last_name !!}</td>
            <td>{!! $ctFaculty->contact->email!!}</td>
            <td>{!! $ctFaculty->contact->gender !!}</td>
            <td>{!! $ctFaculty->contact->join_date !!}</td>
            <td>{!! $ctFaculty->stem !!}</td>
            <td>{!! $ctFaculty->campus_phone !!}</td>

            <td>
                <a href="{{ route('admin.ctFaculties.show', $ctFaculty->id) }}">
                    <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view ctFaculty"></i>
                </a>
                <a href="{{ route('admin.ctFaculties.edit', $ctFaculty->id) }}">
                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit ctFaculty"></i>
                </a>
                {{--<a href="{{ route('admin.ctFaculties.confirm-delete', $ctFaculty->id) }}" data-toggle="modal" data-target="#delete_confirm">--}}
                {{--<i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete ctFaculty"></i>--}}
                {{--</a>--}}
            </td>
        </tr>
        @include('admin.ctFaculties.child_row')

    @endforeach
    </tbody>
</table>
