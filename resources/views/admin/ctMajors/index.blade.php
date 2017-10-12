@extends('admin./layouts/default')

@section('title')
CtMajors
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>CtMajors</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>CtMajors</li>
        <li class="active">CtMajors List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
     @include('flash::message')
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    CtMajors List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('admin.ctMajors.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                {{$ctMajors->links()}}
                 @include('admin.ctMajors.table')
                 
            </div>
        </div>
 </div>
</section>
@stop
