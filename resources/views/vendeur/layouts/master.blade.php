<!doctype html>
<html lang="fr">

<head>
    @include('vendeur.layouts.head')
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
            @include('vendeur.layouts.nav')
        </nav>

        <!--sidebar-->
        <div id="left-sidebar" class="sidebar">
            @include('vendeur.layouts.sidebar')
        </div>

        <!--main-->
        @yield('content')
        
    </div>

<!--footer-->
@include('vendeur.layouts.footer')
</body>
</html>
