<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="Naposao.rs" />
      <meta property="og:description"   content="Your description" />
      <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <title>Naposao</title>
    <!-- Fonts -->
    <script src="https://use.fontawesome.com/a007057742.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700|Open+Sans:400,400i,600,700&amp;subset=latin-ext" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- jQuery -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{ asset('public/js/jquery.validate.js') }}"></script>
    @if(Request::is('payment'))
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('public/js/charge.js') }}"></script> 
    @endif
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    

@yield('styles')
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="app_holder">
        
        
        @include('layouts.header')
        @yield('content')

        <div id="js-heightControl" style="height: 0;">&nbsp;</div>
        <script>
            $(function(){
                $('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
            });
        </script>
        @include('layouts.footer')
    </div>
    <script src="{{ asset('public/js/custom.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,400i,600,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  
  
</body>
</html>