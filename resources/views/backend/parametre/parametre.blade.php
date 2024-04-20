@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Modifier paramètre</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Paramètre</li>
                    </ul>
                </div>      
            </div>
        </div>
        <!--<p class="alert-success" style="padding: 10px">bannière créée avec succès</p>-->
        <div>
            @include('backend.layouts.notification')
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
            <form action="{{route('parametre.update')}}" method="post">
                @csrf
                @method('put')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Titre du projet <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Titre du projet" name="titre" value="{{$parametre->titre}}" required>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Méta description <span class="text-danger">*</span></label>                                                
                            <textarea id="description" rows="2" class="form-control no-resize" placeholder="Méta description" name="meta_description" required>{{$parametre->meta_description}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Méta mot-clé <span class="text-danger">*</span></label>                                                
                            <textarea id="description" rows="2" class="form-control no-resize" placeholder="Meta mot-clé" name="meta_keywords" required>{{$parametre->meta_keywords}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Pied de page <span class="text-danger">*</span></label>                                                
                            <textarea id="description" rows="2" class="form-control no-resize" placeholder="Pied de page" name="footer" required>{{$parametre->footer}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="">Logo <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white">
                                    <i class="fa fa-picture-o"></i> Choisir
                                </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$parametre->logo}}" required>
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>                                                
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="">Favicon</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary" style="color: white">
                                    <i class="fa fa-picture-o"></i> Choisir
                                </a>
                                </span>
                                <input id="thumbnail1" class="form-control" type="text" name="favicon" value="{{$parametre->favicon}}">
                            </div>
                            <div id="holder1" style="margin-top:15px;max-height:100px;"></div>                                                
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="">Adresse <span class="text-danger">*</span></label>                                                
                            <textarea id="description" rows="1" class="form-control no-resize" placeholder="Adresse" name="adresse" required>{{$parametre->adresse}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Email <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$parametre->email}}" required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Telephone <span class="text-danger">*</span></label>                                        
                            <input type="text" min="0" class="form-control" placeholder="Telephone" name="telephone" value="{{$parametre->telephone}}" required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Fax</label>                                        
                            <input type="text" min="0" class="form-control" placeholder="Fax" name="fax" value="{{$parametre->fax}}">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Facebook Url</label>                                        
                            <input type="text" class="form-control" placeholder="Facebook Url" name="facebook_url" value="{{$parametre->facebook_url}}">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Twitter Url</label>                                        
                            <input type="text" class="form-control" placeholder="Twitter Url" name="twitter_url" value="{{$parametre->twitter_url}}">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Linkedin Url</label>                                        
                            <input type="text" class="form-control" placeholder="Linkedin Url" name="linkedin_url" value="{{$parametre->linkedin_url}}">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">        
                            <label for="">Pinterest Url</label>                                        
                            <input type="text" class="form-control" placeholder="Pinterest Url" name="pinterest_url" value="{{$parametre->pinterest_url}}">
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
        $('#lfm, #lfm1').filemanager('image');
    </script>

    {{-- <script>
        $(document).ready(function(){
            $('#description').summernote();
        });
    </script> --}}
@endsection