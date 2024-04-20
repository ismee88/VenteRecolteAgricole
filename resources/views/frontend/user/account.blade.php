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
                        <li class="breadcrumb-item active"><a href="{{route('user.dashboard')}}">Mon compte</a></li>
                        <li class="breadcrumb-item active">Détails du compte</li>
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
                        <h5 class="mb-3">Détails du compte</h5>

                        <form action="{{route('account.update',$user->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="firstName">Nom complet *</label>
                                        <input type="text" class="form-control" id="nom_complet" name="nom_complet" value="{{$user->nom_complet}}" placeholder="ex. Ismael And">
                                        @error('nom_complet')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="lastName">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" placeholder="ex. Ismee">
                                        @error('username')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="emailAddress">Adresse email *</label>
                                        <input type="email" class="form-control" id="emailAddress" name="email" value="{{$user->email}}" placeholder="ex. ismaeland91p@gmail.com" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="emailAddress">Telephone</label>
                                        <input type="tel" class="form-control" id="telephone" name="telephone" value="{{$user->telephone}}" placeholder="ex. +221781107646">
                                        @error('telephone')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="currentPass">Mot de passe actuel (Ne rien saisir pour ne pas modifier le mot de passe)</label>
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                                        @error('oldpassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="newPass">Nouveau mot de passe (Ne rien saisir pour ne pas modifier le mot de passe)</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword">
                                        @error('newpassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Area -->
@endsection