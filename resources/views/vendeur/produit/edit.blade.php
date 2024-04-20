@extends('vendeur.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Modifier produit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('vendeur')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Produit</li>
                        <li class="breadcrumb-item active">Modifier produit</li>
                    </ul>
                </div>        
            </div>
        </div>
        <div>
            @if($errors->any)
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="body" style="background-color: white; padding: 20px; border-radius: 10px">
            <form action="{{route('vendeur-produit.update', $produit->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">        
                                <label for="">Titre <span class="text-danger">*</span></label>                                        
                                <input type="text" class="form-control" placeholder="Titre" name="titre" value="{{$produit->titre}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Photo <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white">
                                        <i class="fa fa-picture-o"></i> Choisir
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$produit->photo}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>                                                
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Résumé<span class="text-danger">*</span></label>                                                
                                <textarea id="resume" rows="10" class="form-control no-resize" placeholder="Veuillez saisir la résumé..." name="resume">{{$produit->resume}}</textarea>
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>                                                
                                <textarea id="description" rows="10" class="form-control no-resize" placeholder="Veuillez saisir la description..." name="description">{{$produit->description}}</textarea>
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Retour & Annulation</label>                                                
                                <textarea id="returncancel" rows="10" class="form-control no-resize description" placeholder="Rédiger un texte..." name="return_cancellation">{{$produit->return_cancellation}}</textarea>
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Categorie <span class="text-danger">*</span></label>
                                <select id="cat_id" class="form-control show-tick" name="cat_id">
                                    <option value="">-- Categorie --</option>
                                    @foreach (\App\Models\Categorie::where('statut','active')->get() as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $produit->cat_id ? 'selected' : ''}}>{{$cat->titre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="">Vendeur <span class="text-danger">*</span></label>
                                <input type="text" name="" class="form-control" value="{{\App\Models\Vendeur::where('id',auth('vendeur')->user()->id)->value('nom_complet')}}" readonly>
                                <input type="hidden" name="vendeur_id" class="form-control" value="{{$produit->vendeur_id}}">
                                
                                </select>
                            </div>
                        </div>
    
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">        
                                <label for="">Stock <span class="text-danger">*</span></label>                                        
                                <input type="number" class="form-control" placeholder="Stock" min="1" name="stock" value="{{$produit->stock}}">
                            </div>
                        </div>
    
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">        
                                <label for="">Prix <span class="text-danger">*</span></label>                                        
                                <input type="number" step="any" class="form-control" placeholder="Prix" min="0" name="prix" value="{{$produit->prix}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">        
                                <label for="">Réduction (%)</label>                                        
                                <input type="number" class="form-control" placeholder="Réduction en pourcentage" name="reduction" min="0" max="100" value="{{$produit->reduction}}">
                            </div>
                        </div>
    
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">        
                                <label for="">Poids (kg)<span class="text-danger">*</span></label>                                        
                                <input type="text" class="form-control" placeholder="Poids en kg" min="0" name="poids" value="{{$produit->poids}}">
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Condition <span class="text-danger">*</span></label>
                                <select class="form-control show-tick" name="condition">
                                    <option value="">-- Condition --</option>
                                    <option value="Nouveau" {{$produit->condition  == 'Nouveau' ? 'selected' : ''}}>Nouveau</option>
                                    <option value="Par default" {{$produit->condition  == 'Par default' ? 'selected' : ''}}>Par default</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button> &nbsp;&nbsp;
                    <button type="reset" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    
    <script>
        $('#lfm,#lfm2').filemanager('image');
    </script>

    <script>
        $(document).ready(function(){
            $('#description, #resume, #infosup, #returncancel').summernote();
        });
    </script>

@endsection