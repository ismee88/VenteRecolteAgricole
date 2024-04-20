@extends('frontend.layouts.master')

@section('content')
        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Mon compte</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                            <li class="breadcrumb-item active">Mon compte</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- My Account Area -->
        <section class="my-account-area section_padding_100_50">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="my-account-navigation mb-50">
                            @include('frontend.user.sidebar')
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="my-account-content mb-50">
                            <p>Bonjour <strong>{{$user->nom_complet}}</strong> !</p>
                            <p>Depuis le tableau de bord de votre compte, vous pouvez consulter vos commandes récentes, gérer vos adresses de livraison et de facturation, et <a href="account-details.html">modifier votre mot de passe et les détails de votre compte</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- My Account Area -->
@endsection