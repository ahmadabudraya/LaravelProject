<!DOCTYPE html>
<html>
    <head>
        <title>Resume</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="{{ asset('css/bootMin.css') }}"> 
        <link rel="stylesheet" href="{{ asset('css/profileStyle.css') }}">
    </head>
    <body>
        @yield('popup')
		<div class="container">
			@include('inc.nav')
    		@yield('content')
		</div>
        <script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jQuery.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>