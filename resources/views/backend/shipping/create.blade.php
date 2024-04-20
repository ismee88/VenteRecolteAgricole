@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Ajouter expédition</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Expédition</li>
                        <li class="breadcrumb-item active">Ajouter expédition</li>
                    </ul>
                </div>      
            </div>
        </div>
        <!--<p class="alert-success" style="padding: 10px">bannière créée avec succès</p>-->
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
            <form action="{{route('shipping.store')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Méthode de livraison <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Méthode de livraison" name="methode_de_livraison" value="{{old('methode_de_livraison')}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Délai de livraison <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Délai de livraison" name="delai_de_livraison" value="{{old('delai_de_livraison')}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Fais de livraison</label>                                        
                            <input type="number" step="any" min="0" class="form-control" placeholder="Frais de livraison" name="frais_de_livraison" value="{{old('frais_de_livraison')}}">
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
                <button type="submit" class="btn btn-primary">Ajouter</button> &nbsp;&nbsp;
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
            $('#description').summernote();
        });
    </script>
@endsection