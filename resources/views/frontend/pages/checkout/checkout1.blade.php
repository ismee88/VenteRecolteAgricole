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
        <a class="active" href="checkout-2.html"><i class="icofont-check-circled"></i> Facturation</a>
        <a href="#"><i class="icofont-check-circled"></i> Méthode de livraison</a>
        <a href="#"><i class="icofont-check-circled"></i> Paiement</a>
        <a href="#"><i class="icofont-check-circled"></i> Révision</a>
    </div>

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-4">Détails de la facturation</h5>
                        <form action="{{route('checkout1.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Nom complet <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nom_complet" name="nom_complet" placeholder="Nom" value="{{$user->nom_complet}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Adresse email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email" value="{{$user->email}}" readonly required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Telephone <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="telephone" name="telephone" min="0" value="{{$user->telephone}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Pays <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pays" name="pays" value="{{$user->pays}}" placeholder="ex. Sénégal" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street_address">Adresse <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="{{$user->adresse}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">Ville <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" value="{{$user->ville}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Etat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="etat" name="etat" placeholder="Etat" value="{{$user->etat}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Code postal/Zip <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Code postal / Zip" value="{{$user->code_postal}}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="order-notes">Notes de commande</label>
                                    <textarea class="form-control" id="order-notes" name="note" cols="30" rows="10" placeholder="Notes concernant votre commande, par exemple des notes spéciales pour la livraison."></textarea>
                                </div>
                            </div>

                            <!-- Different Shipping Address -->
                            <div class="different-address mt-50">
                                <div class="ship-different-title mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Expédier à la même adresse ?</label>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-6 mb-3">
                                        <label for="snom_complet">Nom complet <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="snom_complet" name="snom_complet" placeholder="Nom" value="{{$user->snom_complet}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email_address">Adresse email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="semail" name="semail" placeholder="Adresse email" value="{{$user->email}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number">Telephone <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="stelephone" name="stelephone" placeholder="Telephone" min="0" value="{{$user->telephone}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country">Pays <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="spays" name="spays" value="{{$user->spays}}" placeholder="ex. Sénégal" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="street_address">Adresse <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="sadresse" name="sadresse" placeholder="Adresse" value="{{$user->sadresse}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city">Ville <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="sville" name="sville" placeholder="Ville" value="{{$user->sville}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">Etat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="setat" name="setat" placeholder="Etat" value="{{$user->setat}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="postcode">Code postal/Zip <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="scode_postal" name="scode_postal" placeholder="Code postal / Zip" value="{{$user->scode_postal}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="sous_total" value="{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()}}">
                                <input type="hidden" name="montant_total" value="{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()}}">
                                <div class="checkout_pagination d-flex justify-content-end mt-50">
                                    <a href="{{route('cart')}}" class="btn btn-primary mt-2 ml-2">Retour au panier</a>
                                    <button type="submit" class="btn btn-primary mt-2 ml-2">Continuer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area -->
@endsection

@section('scripts')
    <script>
        $('#customCheck1').on('change',function(e){
            e.preventDefault();
            if(this.checked){
                $('#snom_complet').val($('#nom_complet').val());
                $('#stelephone').val($('#telephone').val());
                $('#semail').val($('#email').val());
                $('#spays').val($('#pays').val());
                $('#sadresse').val($('#adresse').val());
                $('#sville').val($('#ville').val());
                $('#setat').val($('#etat').val());
                $('#scode_postal').val($('#code_postal').val());
            }else{
                $('#snom_complet').val("");
                $('#stelephone').val("");
                $('#semail').val("");
                $('#spays').val("");
                $('#sadresse').val("");
                $('#sville').val("");
                $('#setat').val("");
                $('#scode_postal').val("");
            }
        })
    </script>
@endsection