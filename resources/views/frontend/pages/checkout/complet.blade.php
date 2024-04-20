@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Caisse</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                        <li class="breadcrumb-item active">Caisse</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->
    <!-- Checkout Step Area -->
    <div class="checkout_steps_area">
        <a class="complated" href="{{route('checkout1')}}"><i class="icofont-check-circled"></i> Facturation</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Méthode de livraison</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Paiement</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Révision</a>
        <a href="" class="complated"></a>
    </div>
    <!-- Checkout Step Area -->
        <!-- Checkout Area -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="order_complated_area clearfix">
                            <h5>Nous vous remercions pour votre commande.</h5>
                            <p>Vous recevrez un courriel contenant les détails de votre commande</p>
                            <p class="orderid mb-0">Votre numéro de commande : n°{{$commande}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout Area End -->
@endsection