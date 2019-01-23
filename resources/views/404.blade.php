<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>Naposao</title>
    <!-- Fonts -->
    <script src="https://use.fontawesome.com/a007057742.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    
    <script src="{{ asset('public/js/jquery.validate.js') }}"></script>
    <!-- JS -->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
@yield('styles')
</head>
<body>

<div class="page_not_found_container">
	<div class="page_not_found_msg">
		<h1 class="bold"><span>404</span><span>Page not found!</span></h1>
		<h3 class="bold">The requested page was not found</h3>
		<p>
			<a href="{{ URL::to('/')}}" class="error_back_to">
                <img src="{{ URL::to('/')}}/photos/naposaologo.png" alt="">
            </a>
        </p>

        <p class="easter">Stefika ima najjace muske tange</p>
	</div>
</div>

</body>