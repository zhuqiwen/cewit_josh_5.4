@extends('admin./layouts/default')

@section('title')
CtStudents
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>CtStudents</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>CtStudents</li>
        <li class="active">CtStudents List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
     @include('flash::message')


        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    CtStudents List
                    <span>
                        found: {{$ctStudents->total()}} records
                    </span>
                    @include('admin.ctStudents.export_button')
                    <span>
                        <button form="export_form">Export to CSV</button>
                    </span>
                </h4>

                <div class="pull-right">
                    @if(env('APP_DEBUG'))
                        <a href="{{ route('admin.ctStudents.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    @else
                        <a href="{{ route('admin.ctStudents.create') }}" class="btn btn-sm btn-default" disabled="true"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    @endif
                </div>
            </div>
            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-12" id="filter-div">
                        @include('admin.ctStudents.filter')
                    </div>
                </div>
                <div style="text-align: center">
                    {{$ctStudents->appends(Request::except(['page', '_token']))->links()}}

                </div>
                 @include('admin.ctStudents.table')
            </div>
        </div>
 </div>
</section>
@stop

@push('scripts')
@endpush
