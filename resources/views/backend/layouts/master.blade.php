<!doctype html>
<html lang="fr">

<head>
    @include('backend.layouts.head')
</head>

<body class="theme-cyan">

    <!-- Chargement de la page -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('backend/assets/images/loading.gif')}}" width="48" height="48" alt="FarmGoods"></div>
            <p>Merci de patienter...</p>        
        </div>
    </div>

    <!-- Superposition pour les barres latérales -->

    <div id="wrapper">

        <!--navbar-->
        <nav class="navbar navbar-fixed-top">
            @include('backend.layouts.nav')
        </nav>

        <!--sidebar-->
        <div id="left-sidebar" class="sidebar">
            @include('backend.layouts.sidebar')
        </div>

        <!--main-->
        @yield('content')
        
    </div>

<!--footer-->
@include('backend.layouts.footer')
</body>
</html>
