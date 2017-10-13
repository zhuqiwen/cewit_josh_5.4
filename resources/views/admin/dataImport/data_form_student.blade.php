<form class="form-horizontal" action="{{route('admin.dataImport')}}" method="post" enctype="multipart/form-data">
    {!! Form::hidden('category', 'student') !!}
    <!-- CSRF Token -->
    {{ csrf_field() }}
    <!-- File Upload -->
    <div class="form-group">
        <div class="col-md-12">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileinput-new">Select student data file</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="data-file" />
                                            </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
        <!-- Form actions -->
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Submit</button>
        </div>
    </div>

</form>