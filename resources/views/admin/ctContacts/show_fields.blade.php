<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ctContact->id !!}</p>
    <hr>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $ctContact->first_name !!}</p>
    <hr>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $ctContact->last_name !!}</p>
    <hr>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $ctContact->email !!}</p>
    <hr>
</div>

<!-- Iu Username Field -->
<div class="form-group">
    {!! Form::label('iu_username', 'Iu Username:') !!}
    <p>{!! $ctContact->iu_username !!}</p>
    <hr>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $ctContact->gender !!}</p>
    <hr>
</div>

<!-- Join Date Field -->
<div class="form-group">
    {!! Form::label('join_date', 'Join Date:') !!}
    <p>{!! $ctContact->join_date !!}</p>
    <hr>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>@if( $ctContact->is_active  =='1') true @else false @endif</p>
    <hr>
</div>

<!-- Is Affiliate Field -->
<div class="form-group">
    {!! Form::label('is_affiliate', 'Is Affiliate:') !!}
    <p>@if( $ctContact->is_affiliate  =='1') true @else false @endif</p>
    <hr>
</div>

<!-- Is Test Field -->
<div class="form-group">
    {!! Form::label('is_test', 'Is Test:') !!}
    <p>@if( $ctContact->is_test  =='1') true @else false @endif</p>
    <hr>
</div>

