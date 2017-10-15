@extends('admin./layouts/default')

@section('title')
CtFaculties
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>CtFaculties</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>CtFaculties</li>
        <li class="active">CtFaculties List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
     @include('flash::message')
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    CtFaculties List
                    <span>
                        found: {{$ctFaculties->total()}} records
                    </span>
                </h4>
                <div class="pull-right">
                    @if(env('APP_DEBUG'))
                    <a href="{{ route('admin.ctFaculties.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    @else
                    <a href="{{ route('admin.ctFaculties.create') }}" class="btn btn-sm btn-default" disabled="true"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    @endif
                </div>
            </div>
            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-12" id="filter-div">
                        @include('admin.ctFaculties.filter')
                    </div>
                </div>

                <div style="text-align: center">
                    {{$ctFaculties->appends(Request::except(['page', '_token']))->links()}}
                </div>
{{--                 @include('admin.ctFaculties.table')--}}
                 @include('admin.ctFaculties.table')

            </div>
        </div>
 </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
    <script src="{{ asset('assets/js/ct_faculty/index.js') }}" ></script>
@stop
