@extends('frontend.layouts.master')

@section('content')
        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Favoris</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                            <li class="breadcrumb-item active">Favoris</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- Wishlist Table Area -->
        <div class="wishlist-table section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table wishlist-table">
                            <div class="table-responsive" id="wishlist_list">
                                @include('frontend.layouts._wishlist')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Table Area -->
@endsection

@section('scripts')
        {{-- Move to cart --}}
        <script>
            $(document).on('click','.move-to-cart',function(e){
                e.preventDefault();
                var rowId = $(this).data('id');
                var token = "{{csrf_token()}}";
                var path = "{{route('wishlist.move.cart')}}";

                $.ajax({
                    url:path,
                    type:"POST",
                    data:{
                        _token:token,
                        rowId:rowId,
                    },
                    beforeSend:function(){
                        $(this).html('<i class="fa fa-spinner fa-spin"></> Chargement');
                    },
                    success:function(data){
                        if(data['statut']){
                            $('body #cart_counter').html(data['cart_count']);
                            $('body #wishlist_list').html(data['wishlist_list']);
                            $('body #header-ajax').html(data['header']);
                            swal({
                                title: "Bon travail !",
                                text: data['message'],
                                icon: "success",
                                button: "Ok",
                            });
                        }
                        else{
                            swal({
                                title: "Opps !",
                                text: "Quelque chose a mal tourné !",
                                icon: "warning",
                                button: "Ok",
                            });
                        }
                    },
                    error:function(err){
                        swal({
                            title: "Ereur",
                            text: "Quelques erreurs",
                            icon: "error",
                            button: "Ok",
                        });
                    }
                })
            })
        </script>

        {{-- Delete wishlist --}}
        <script>
            $(document).on('click','.delete_wishlist',function(e){
                e.preventDefault();
                var rowId = $(this).data('id');
                var token = "{{csrf_token()}}";
                var path = "{{route('wishlist.delete')}}";

                $.ajax({
                    url:path,
                    type:"POST",
                    data:{
                        _token:token,
                        rowId:rowId,
                    },
                    success:function(data){
                        if(data['statut']){
                            $('body #cart_counter').html(data['cart_count']);
                            $('body #wishlist_list').html(data['wishlist_list']);
                            $('body #header-ajax').html(data['header']);
                            swal({
                                title: "Bon travail !",
                                text: data['message'],
                                icon: "success",
                                button: "Ok",
                            });
                        }
                        else{
                            swal({
                                title: "Opps !",
                                text: "Quelque chose a mal tourné !",
                                icon: "warning",
                                button: "Ok",
                            });
                        }
                    },
                    error:function(err){
                        swal({
                            title: "Ereur",
                            text: "Quelques erreurs",
                            icon: "error",
                            button: "Ok",
                        });
                    }
                })
            })
        </script>
@endsection