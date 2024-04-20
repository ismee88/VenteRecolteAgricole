@extends('frontend.layouts.master')

@section('content')
    </div>
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Mon compte</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('user.dashboard')}}">Mon compte</a></li>
                        <li class="breadcrumb-item active">Adresses</li>
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
                        <p>Les adresses suivantes seront utilisées par défaut sur la page de paiement.</p>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                                <h6 class="mb-3">Adresse de facturation</h6>
                                @if ($user->pays == null || $user->ville == null || $user->code_postal == null)
                                    <address>
                                        Vous n'avez pas encore configuré ce type d'adresse.
                                    </address>
                                @else
                                    <address>
                                        {{$user->adresse}} <br>
                                        {{$user->pays}} <br>
                                        {{$user->ville}} <br>
                                        {{$user->etat}} <br>
                                        {{$user->code_postal}}
                                    </address>
                                @endif

                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#factEdit">Modifier l'adresse</a>

                                <!--Adresse de facturation Modal -->
                                <div class="modal fade" id="factEdit" tabindex="-1" role="dialog" aria-labelledby="factEditTitle" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="factEditTitle">Modifier l'adresse de facturation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('billing.address', $user->id)}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Pays</label>
                                                        <input type="text" class="form-control" name="pays" value="{{$user->pays}}" placeholder="ex. Senegal" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ville</label>
                                                        <input type="text" class="form-control" name="ville" value="{{$user->ville}}" placeholder="ex. Dakar" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Adresse</label>
                                                        <textarea name="adresse" class="form-control" id="" placeholder="ex. Dakar Dieuppeul" required>{{$user->adresse}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Etat</label>
                                                        <input type="text"class="form-control" name="etat" value="{{$user->etat}}" placeholder="ex. Etat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Code postal</label>
                                                        <input type="number" class="form-control" name="code_postal" required value="{{$user->code_postal}}" placeholder="ex. 11000">
                                                        @error('code_postal')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-6">
                                <h6 class="mb-3">Adresse de livraison</h6>
                                @if ($user->spays == null || $user->sville == null || $user->scode_postal == null)
                                    <address>
                                        Vous n'avez pas encore configuré ce type d'adresse.
                                    </address>
                                @else
                                    <address>
                                        {{$user->sadresse}} <br>
                                        {{$user->spays}} <br>
                                        {{$user->sville}} <br>
                                        {{$user->setat}} <br>
                                        {{$user->scode_postal}}
                                    </address>
                                @endif
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#livEdit">Modifier l'adresse</a>

                                <!--Adresse de livraison Modal -->
                                <div class="modal fade" id="livEdit" tabindex="-1" role="dialog" aria-labelledby="livEditTitle" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="livEditTitle">Modifier l'adresse de livraison</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('shipping.address', $user->id)}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Pays d'expédition</label>
                                                        <input type="text" class="form-control" name="spays" value="{{$user->spays}}" placeholder="ex. Senegal" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ville d'expédition</label>
                                                        <input type="text" class="form-control" name="sville" value="{{$user->sville}}" placeholder="ex. Dakar" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Adresse d'expédition</label>
                                                        <textarea name="sadresse" class="form-control" id="" placeholder="ex. Dakar Dieuppeul" required>{{$user->sadresse}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Etat d'expédition</label>
                                                        <input type="text"class="form-control" name="setat" value="{{$user->setat}}" placeholder="ex. Etat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Code postal de l'expédition</label>
                                                        <input type="number" class="form-control" name="scode_postal" value="{{$user->scode_postal}}" placeholder="ex. 11000" required>
                                                        @error('telephone')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Area -->
@endsection

@section('styles')
    <style>
        .footer_area{
            z-index: -1;
        }
        .header_area{
            z-index: -1;
        }
    </style>
@endsection