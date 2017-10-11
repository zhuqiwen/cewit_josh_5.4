<!-- First Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Iu Username Field -->
<div class="form-group col-sm-12">
    {!! Form::label('iu_username', 'Iu Username:') !!}
    {!! Form::text('iu_username', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Join Date Field -->
<div class="form-group col-sm-12">
    {!! Form::label('join_date', 'Join Date:') !!}
    {!! Form::date('join_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('is_active', '1') !!} Active
    </label>
</div>

<!-- Is Affiliate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_affiliate', 'Is Affiliate:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('is_affiliate', '1') !!} Affiliate
    </label>
</div>

<!-- Is Test Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_test', 'Is Test:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('is_test', '1') !!} Test Account
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.ctContacts.index') !!}" class="btn btn-default">Cancel</a>
</div>
