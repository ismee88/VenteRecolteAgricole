@extends('backend.layouts.master')

@section('content')  

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row" >
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Modifier coupon</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Coupon</li>
                        <li class="breadcrumb-item active">Modifier coupon</li>
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
            <form action="{{route('coupon.update', $coupon->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Code coupon <span class="text-danger">*</span></label>                                        
                            <input type="text" class="form-control" placeholder="ex. HAPPY" name="code" value="{{$coupon->code}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">        
                            <label for="">Valeur coupon <span class="text-danger">*</span></label>                                        
                            <input type="number" min="0" class="form-control" placeholder="Valeur" name="valeur" value="{{$coupon->valeur}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Type coupon <span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="type">
                                <option value="">-- Type --</option>
                                <option value="fixe" {{$coupon->type == 'fixe' ? 'selected' : ''}}>Fixe</option>
                                <option value="pourcent" {{$coupon->type == 'pourcent' ? 'selected' : ''}}>Pourcent</option>
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