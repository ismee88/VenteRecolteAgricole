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

    <div class="checkout_steps_area">
        <a class="complated" href="{{route('checkout1')}}"><i class="icofont-check-circled"></i> Facturation</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Méthode de livraison</a>
        <a class="active" href="#"><i class="icofont-check-circled"></i> Paiement</a>
        <a href="#"><i class="icofont-check-circled"></i> Révision</a>
    </div>

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <form action="{{route('checkout3.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="checkout_details_area clearfix">
                            <div class="payment_method">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- Single Payment Method -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="one">
                                            <h6 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_one" aria-expanded="false" aria-controls="collapse_one"><i class="icofont-mastercard-alt"></i> Payer par carte de crédit</a>
                                            </h6>
                                        </div>
                                        <div aria-expanded="false" id="collapse_one" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="one">
                                            <div class="panel-body">
                                                <div class="pay_with_creadit_card">
                                                    <form action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Credit or Debit Card</label>
                                                                </div> --}}
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="cardNumber">Numéro de carte</label>
                                                                <input type="text" class="form-control" id="cardNumber" placeholder="" value="">
                                                                <small id="card_info_store" class="form-text text-muted"><i class="fa fa-lock" aria-hidden="true"></i> Vos informations de paiement sont stockées en toute sécurité. <a href="#">En savoir plus</a></small>
                                                            </div>
                                                            <div class="col-12 col-md-3 mb-3">
                                                                <label for="expiration">Expiration</label>
                                                                <input type="text" class="form-control" id="expiration" placeholder="MM / YY" value="" >
                                                            </div>
                                                            <div class="col-12 col-md-3 mb-3">
                                                                <label for="security_code">Code de sécurité <a href="#" class="security_code_popover" data-container="body" data-toggle="popover" data-placement="top" data-content="" data-img="img/bg-img/cvc.jpg"> <i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                                                <input type="text" class="form-control" id="security_code" placeholder="" value="" >
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary">Soumettre</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Payment Method -->
                                    {{-- <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="two">
                                            <h6 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_two" aria-expanded="false" aria-controls="collapse_two"><i class="icofont-paypal-alt"></i> Payer avec PayPal</a>
                                            </h6>
                                        </div>
                                        <div aria-expanded="false" id="collapse_two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="two">
                                            <div class="panel-body">
                                                <div class="pay_with_paypal">
                                                    <form action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="paypalemailaddress">Adresse e-mail</label>
                                                                <input type="email" class="form-control" id="paypalemailaddress" placeholder="" value="" >
                                                                <small id="paypal_info" class="form-text text-muted"><i class="fa fa-lock" aria-hidden="true"></i> Paiements en ligne sécurisés à la vitesse de votre choix. <a href="#">En savoir plus</a></small>
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="paypalpassword">Mot de passe</label>
                                                                <input type="password" class="form-control" id="paypalpassword" value="" >
                                                                <small id="paypal_password" class="form-text text-muted"><a href="#">Mot de passe oublié?</a></small>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary">Soumettre</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Single Payment Method -->
                                    {{-- <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="three">
                                            <h6 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_three" aria-expanded="false" aria-controls="collapse_three"><i class="icofont-bank-transfer-alt"></i> Virement bancaire direct</a>
                                            </h6>
                                        </div>
                                        <div aria-expanded="false" id="collapse_three" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="three">
                                            <div class="panel-body">
                                                <p>Effectuez votre paiement directement sur notre compte bancaire. Veuillez utiliser votre numéro de commande comme référence de paiement. Votre commande ne sera expédiée que lorsque les fonds seront crédités sur notre compte.</p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Single Payment Method -->
                                    {{-- <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="four">
                                            <h6 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_four" aria-expanded="false" aria-controls="collapse_four"><i class="icofont-file-document"></i> Paiement par chèque
                                                </a>
                                            </h6>
                                        </div>
                                        <div aria-expanded="false" id="collapse_four" class="panel-collapse collapse" role="tabpanel" aria-labelledby="four">
                                            <div class="panel-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Single Payment Method -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="five">
                                            <h6 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_five" aria-expanded="false" aria-controls="collapse_five"><i class="icofont-cash-on-delivery-alt"></i> Paiement à la livraison
                                                </a>
                                            </h6>
                                        </div>
                                        <div aria-expanded="false" id="collapse_five" class="panel-collapse collapse" role="tabpanel" aria-labelledby="five">
                                            
                                            <div class="panel-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="methode_paiement" value="cod" class="custom-control-input" id="customCheck2" required>
                                                    <label class="custom-control-label" for="customCheck2">Paiement à la livraison</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="checkout_pagination d-flex justify-content-end mt-30">
                            <a href="checkout-3.html" class="btn btn-primary mt-2 ml-2">Retour</a>
                            <button type="submit" class="btn btn-primary mt-2 ml-2">Dernière étape</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection