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
        <a class="active" href="#"><i class="icofont-check-circled"></i> Révision</a>
    </div>
    <!-- Checkout Step Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-30">Révision de votre commande</h5>

                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-30">
                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Produit</th>
                                            <th scope="col">Prix unitaire</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{$item->model->photo}}" alt="Product">
                                                </td>
                                                <td>
                                                    <a href="{{route('detail.produit',$item->model->slug)}}">{{$item->name}}</a>
                                                </td>
                                                <td>{{number_format($item->price,2)}} CFA</td>
                                                <td>
                                                    {{$item->qty}}
                                                </td>
                                                <td>{{$item->subtotal}} CFA</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 ml-auto">
                    <div class="cart-total-area">
                        <h5 class="mb-3">Total du panier</h5>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sous-total</td>
                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} CFA</td>
                                    </tr>
                                    <tr>
                                        <td>Frais de livraison</td>
                                        <td>{{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison'],2)}} CFA</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>VAT (10%)</td>
                                        <td>$5.60</td>
                                    </tr> --}}
                                    @if (\Illuminate\Support\Facades\Session::has('coupon'))
                                        <tr>
                                            <td>Coupon</td>
                                            <td>- {{number_format(\Illuminate\Support\Facades\Session::get('coupon')['valeur'],2)}}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Total</td>
                                        {{-- @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                            <td>{{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison']-\Illuminate\Support\Facades\Session::get('coupon')['valeur'],2)}} CFA</td>
                                        @elseif (\Illuminate\Support\Facades\Session::has('checkout'))
                                            <td>{{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison']),2}} CFA</td>
                                        @endif --}}
                                        @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                            <td>{{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison']-\Illuminate\Support\Facades\Session::get('coupon')['valeur'],2)}} CFA</td>
                                        @else
                                            <td>{{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison'])}} CFA</td>
                                            {{-- <td>{{number_format((float)str_replace(',', '', \Gloudemans\Shoppingcart\Facades\Cart::subtotal()) + \Illuminate\Support\Facades\Session::get('checkout')[0]['frais_de_livraison']),2}} CFA</td> --}}
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout_pagination d-flex justify-content-end mt-3">
                            <a href="checkout-4.html" class="btn btn-primary mt-2 ml-2 d-none d-sm-inline-block">Go Back</a>
                            <a href="{{route('checkout.store')}}" class="btn btn-primary mt-2 ml-2">Confirmer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection