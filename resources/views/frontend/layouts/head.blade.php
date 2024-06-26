<meta charset="UTF-8">
<meta name="description" content="{{get_setting('meta_description')}}">
<meta name="keywords" content="{{get_setting('meta_keywords')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>{{get_setting('titre')}}</title>

<!-- Favicon  -->
<link rel="icon" href="{{asset(get_setting('favicon'))}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/classy-nav.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/icofont.min.css')}}">

{{-- autocomplete --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

@yield('styles')