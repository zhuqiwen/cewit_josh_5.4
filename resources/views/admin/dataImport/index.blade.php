@extends('admin./layouts/default')

@section('title')
    Data Import
    @parent
@stop


{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"  rel="stylesheet" type="text/css" />

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Data Import</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Data Import</li>
            <li class="active">index</li>
        </ol>
    </section>

    <section class="content paddingleft_right15">
        <div class="row">
            @include('flash::message')

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Import Students
                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('admin.dataImport.data_form_student')
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Import Majors
                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('admin.dataImport.data_form_major')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop


{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>

@stop
