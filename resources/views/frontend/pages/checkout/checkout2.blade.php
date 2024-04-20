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

    <!-- Checkout Steps Area -->
    <div class="checkout_steps_area">
        <a class="complated" href="{{route('checkout1')}}"><i class="icofont-check-circled"></i> Facturation</a>
        <a class="active" href="#"><i class="icofont-check-circled"></i> Méthode de livraison</a>
        <a href="#"><i class="icofont-check-circled"></i> Paiement</a>
        <a href="#"><i class="icofont-check-circled"></i> Révision</a>
    </div>
    <!-- Checkout Steps Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <form action="{{route('checkout2.store')}}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-12">
                        <div class="checkout_details_area clearfix">
                            <h5 class="mb-4">Méthode de livraison</h5>

                            <div class="shipping_method">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Méthode de livraison</th>
                                                <th scope="col">Délai de livraison</th>
                                                <th scope="col">frais de livraison</th>
                                                <th scope="col">Choisir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($shippings) > 0)
                                                @foreach ($shippings as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{$item->methode_de_livraison}}</th>
                                                        <td>{{$item->delai_de_livraison}}</td>
                                                        <td>{{number_format($item->frais_de_livraison)}} CFA</td>
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio{{$key}}" name="frais_de_livraison" value="{{$item->frais_de_livraison}}" class="custom-control-input" required>
                                                                <label class="custom-control-label" for="customRadio{{$key}}"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr><td colspan="4">Aucune méthode d'expédition trouvée !</td></tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="checkout_pagination mt-3 d-flex justify-content-end clearfix">
                            <a href="{{route('checkout1')}}" class="btn btn-primary mt-2 ml-2">Retour</a>
                            <button type="submit" class="btn btn-primary mt-2 ml-2">Continuer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection