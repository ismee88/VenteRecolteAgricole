@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Modifier banniere</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Banniere</li>
                        <li class="breadcrumb-item active">Modifier banniere</li>
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
            <form action="{{route('banniere.update', $banniere->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Titre <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="Titre" name="titre" value="{{$banniere->titre}}">
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
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banniere->photo}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>                                                
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>                                                
                            <textarea id="description" rows="10" class="form-control no-resize" placeholder="Veuillez saisir la description..." name="description">{{$banniere->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Condition <span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="condition">
                                <option value="banniere" {{$banniere->condition=='banniere' ? 'selected' : ''}}>Banniere</option>
                                <option value="promo" {{$banniere->condition=='promo' ? 'selected' : ''}}>Promo</option>
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