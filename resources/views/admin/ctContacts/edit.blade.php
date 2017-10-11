@extends('admin./layouts/default')

@section('title')
CtContacts
@parent
@stop
@section('content')
  @include('core-templates::common.errors')
    <section class="content-header">
     <h1>CtContacts Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>CtContacts</li>
         <li class="active">Edit CtContacts </li>
     </ol>
    </section>
    <section class="content paddingleft_right15">
      <div class="row">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit  CtContact
                </h4></div>
            <br />
        <div class="panel-body">
        {!! Form::model($ctContact, ['route' => ['admin.ctContacts.update', $ctContact->id], 'method' => 'patch']) !!}

        @include('admin.ctContacts.fields')

        {!! Form::close() !!}
        </div>
      </div>
    </div>
   </section>
 @stop
