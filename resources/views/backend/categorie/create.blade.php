@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Ajouter catégorie</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Catégorie</li>
                        <li class="breadcrumb-item active">Ajouter catégorie</li>
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
            <form action="{{route('categorie.store')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Titre <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Titre" name="titre" value="{{old('titre')}}">
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
                                <input id="thumbnail" class="form-control" type="text" name="photo" >
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>                                                
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Résumé</label>                                                
                            <textarea id="resume" rows="10" class="form-control no-resize" placeholder="Veuillez saisir un résumé..." name="resume">{{old('resume')}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Statut <span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="statut">
                                <option value="">-- Statut --</option>
                                <option value="active" {{old('statut')=='active' ? 'selected' : ''}}>Active</option>
                                <option value="inactive" {{old('statut')=='inactive' ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function(){
            $('#resume').summernote();
        });
    </script>
@endsection