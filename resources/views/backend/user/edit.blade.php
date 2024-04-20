@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Modifier utilisateur</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Utilisateur</li>
                        <li class="breadcrumb-item active">Modifier utilisateur</li>
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
            <form action="{{route('user.update', $user->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Nom complet <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Nom complet" name="nom_complet" value="{{$user->nom_complet}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Nom d'utilisateur</label>                                        
                            <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" value="{{$user->username}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Photo</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white">
                                    <i class="fa fa-picture-o"></i> Choisir
                                </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>                                                
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Email <span class="text-danger">*</span></label>                                        
                            <input type="email" class="form-control" placeholder="Adresse email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Telephone</label>                                        
                            <input type="text" class="form-control" placeholder="ex: +22170000000" name="telephone" value="{{$user->telephone}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Adresse</label>                                        
                            <input type="text" class="form-control" placeholder="Adresse" name="adresse" value="{{$user->adresse}}">
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Role <span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="role">
                                <option value="">-- Role --</option>
                                <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="client" {{$user->role == 'client' ? 'selected' : ''}}>Client</option>
                                <option value="vendeur" {{$user->role == 'vendeur' ? 'selected' : ''}}>Vendeur</option>
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
        $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function(){
            $('#description').summernote();
        });
    </script>
@endsection