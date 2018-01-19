<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Welcome to Josh Frontend</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
{{--            <img src="{{ asset('assets/images/josh-new.png') }}" alt="logo" class="img-responsive mar">--}}
            <h3 class="text-primary">Please select your status</h3>
            <!-- Notifications -->
            <div id="notific">
            @include('notifications')
            </div>

            {!! Form::select(
            'select_join_type',
            ['student' => 'Student', 'more' => 'other options are under construction'],
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Select your status',
                'id' => 'select_join_type'
            ]) !!}

        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/register_custom.js') }}"></script>
<!--global js end-->
</body>
</html>
