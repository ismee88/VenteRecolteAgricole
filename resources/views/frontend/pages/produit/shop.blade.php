@extends('frontend.layouts.master')

@section('content')
        <!-- Quick View Modal Area -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="quickview_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="quickview_pro_img">
                                            <img class="first_img" src="img/product-img/new-1-back.png" alt="">
                                            <img class="hover_img" src="img/product-img/new-1.png" alt="">
                                            <!-- Product Badge -->
                                            <div class="product_badge">
                                                <span class="badge-new">New</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="quickview_pro_des">
                                            <h4 class="title">Boutique Silk Dress</h4>
                                            <div class="top_seller_product_rating mb-15">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <h5 class="price">$120.99 <span>$130</span></h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                            <a href="#">View Full Product Details</a>
                                        </div>
                                        <!-- Add to Cart Form -->
                                        <form class="cart" method="post">
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                            </div>
                                            <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
                                            <!-- Wishlist -->
                                            <div class="modal_pro_wishlist">
                                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                            </div>
                                            <!-- Compare -->
                                            <div class="modal_pro_compare">
                                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                                            </div>
                                        </form>
                                        <!-- Share -->
                                        <div class="share_wf mt-30">
                                            <p>Share with friends</p>
                                            <div class="_icon">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View Modal Area -->
    
        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Produits</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Produits</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <form action="{{route('shop.filter')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                            <div class="shop_sidebar_area">
                                
                                @if(count($cats) > 0)
                                    <!-- Single Widget -->
                                    <div class="widget catagory mb-30">
                                        <h6 class="widget-title">Catégories de produits</h6>
                                        <div class="widget-desc">
                                            @if(!empty($_GET['categorie']))
                                                @php
                                                    $filter_cats = explode(',',$_GET['categorie']);
                                                @endphp
                                            @endif
                                            @foreach ($cats as $cat)
                                                <!-- Single Checkbox -->
                                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                                    <input type="checkbox" @if(!empty($filter_cats) && in_array($cat->slug,$filter_cats)) checked @endif class="custom-control-input" id="{{$cat->slug}}" name="categorie[]" onchange="this.form.submit();" value="{{$cat->slug}}">
                                                    <label class="custom-control-label" for="{{$cat->slug}}">{{ucfirst($cat->titre)}} <span class="text-muted">({{count($cat->produits)}})</span></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
        
                                <!-- Single Widget -->
                                <div class="widget price mb-30">
                                    <h6 class="widget-title">Filtrer par prix</h6>
                                    <div class="widget-desc">
                                        <div class="slider-range">
                                            <div id="slider-range" data-min="{{Helper::minPrice()}}" data-max="{{Helper::maxPrice()}}" data-unit="CFA " class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{Helper::minPrice()}}" data-value-max="{{Helper::maxPrice()}}" data-label-result="Prix:">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            </div>
                                            @if (!empty($_GET['price']))
                                                @php
                                                    $price = explode('-',$_GET['price'])
                                                @endphp
                                            @endif
                                            <input type="hidden" id="price_range" value="@if(!empty($_GET['price'])) {{$_GET['price']}} @endif" name="price_range">
                                            <input type="text" readonly id="amount" style="border:0; width:100%; background-color:#f8f8ff;" value="@if(!empty($_GET['price'])) CFA {{$price[0]}}  @else CFA {{Helper::minPrice()}} @endif - @if(!empty($_GET['price'])) CFA {{$price[1]}}  @else CFA {{Helper::maxPrice()}} @endif">
                                            {{-- <div class="range-price">Price: {{Helper::minPrice()}} - {{Helper::maxPrice()}}</div> --}}
                                            <button type="submit" class="btn btn-sm btn-primary mt-2" style="padding-left: 40%; padding-right: 40%;">Filtrer</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Widget -->
                                {{-- <div class="widget rating mb-30">
                                    <h6 class="widget-title">Average Rating</h6>
                                    <div class="widget-desc">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <span class="text-muted">(103)</span></a></li>
        
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(78)</span></a></li>
        
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(47)</span></a></li>
        
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(9)</span></a></li>
        
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(3)</span></a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                            <!-- Shop Top Sidebar -->
                            <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
                                <div class="view_area d-flex">
                                    <div class="grid_view">
                                        <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="icofont-layout"></i></a>
                                    </div>
                                    <div class="list_view ml-3">
                                        <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="List View"><i class="icofont-listine-dots"></i></a>
                                    </div>
                                </div>
                                <select name="sortBy" onchange="this.form.submit();" class="small right">
                                    <option value=" ">Par défaut</option>
                                    <option value="prixAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='prixAsc') selected @endif>Prix croissant</option>
                                    <option value="prixDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='prixDesc') selected @endif>Prix décroissant</option>
                                    <option value="titreAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titreAsc') selected @endif>alpha croissant</option>
                                    <option value="titreDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titreDesc') selected @endif>alpha décroissant</option>
                                </select>
                            </div>
        
                            <div class="shop_grid_product_area">
                                <div class="row justify-content-center">
                                    <!-- Single Product -->
                                    @if(count($produits) > 0)
                                        @foreach ($produits as $item)
                                            <div class="col-9 col-sm-12 col-md-6 col-lg-4">
                                                <div class="single-product-area mb-30">
                                                    <div class="product_image">
                                                        @php
                                                            $photo = explode(',',$item->photo);
                                                        @endphp
                                                        <!-- Product Image -->
                                                        <img class="normal_img" src="{{$photo[0]}}" alt="{{$item->titre}}" style="width: 300px; height: 250px;">
                                                        {{-- <img class="hover_img" src="img/product-img/new-1.png" alt=""> --}}
                
                                                        <!-- Product Badge -->
                                                        @if($item->condition == "Nouveau")
                                                            <div class="product_badge">
                                                                <span>{{$item->condition}}</span>
                                                            </div>
                                                        @else
                                                            
                                                        @endif
                
                                                        <!-- Wishlist -->
                                                        <div class="product_wishlist">
                                                            <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id={{$item->id}} id="add_to_wishlist_{{$item->id}}"><i class="icofont-heart"></i></a>
                                                        </div>
                
                                                        {{-- <!-- Compare -->
                                                        <div class="product_compare">
                                                            <a href="compare.html"><i class="icofont-exchange"></i></a>
                                                        </div> --}}
                                                    </div>
                
                                                    <!-- Product Description -->
                                                    <div class="product_description">
                                                        <!-- Add to cart -->
                                                        <div class="product_add_to_cart">
                                                            <a href="#" data-quantity="1" data-product-id="{{$item->id}}" class="add_to_cart" id="add_to_cart{{$item->id}}"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                                                        </div>
                                                        <!-- Quick View -->
                                                        {{-- <div class="product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Voir</a>
                                                        </div> --}}
                                                        <div class="product_quick_view">
                                                            <a href="#" data-toggle="moda" data-target="#quickvie"><i class="icofont-eye-alt"></i> Voir</a>
                                                        </div>
                
                                                        <p class="brand_name">{{\App\Models\Categorie::where('id',$item->cat_id)->value('titre')}}</p>
                                                        <a href="{{route('detail.produit',$item->slug)}}">{{ucfirst($item->titre)}}</a>
                                                        @if ($item->reduction != null)
                                                            <h6 class="product-price">{{number_format($item->offre_prix,2)}} CFA <small><del class="text-danger">{{number_format($item->prix,2)}} CFA</del></small></h6>
                                                        @else
                                                            <h6 class="product-price">{{number_format($item->offre_prix,2)}} CFA</h6>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>Aucun produit trouvé !</p>
                                    @endif
                                </div>
                            </div>
                            {{$produits->appends($_GET)->links('vendor.pagination.custom')}}

        
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

@section('scripts')

    {{-- Price slide --}}
    <script>
        $(document).ready(function(){
            if($("#slider-range").length > 0){
                const max_value = parseInt($('#slider-range').data('max')) || 500;
                const min_value = parseInt($('#slider-range').data('min')) || 0;
                const currency = $("#slider-range").data('currency') || '';
                let price_range = min_value+'-'+max_value;

                if($("#price_range").lenght > 0 && $("#price_range").val()){
                    price_range = $("#price_range").val().trim();
                }
                
                let price = price_range.split('-');

                $('#slider-range').slider({
                    range:true,
                    min:min_value,
                    max:max_value,
                    values:price,
                    slide:function(event,ui){
                        $('#amount').val('CFA '+ui.values[0]+"-"+'CFA '+ui.values[1]);
                        $('#price_range').val(ui.values[0]+"-"+ui.values[1]);
                    }
                })
            }
        });
    </script>

    {{-- Add to cart --}}
    <script>
        $(document).on('click','.add_to_cart', function(e){
            e.preventDefault();
            var produit_id = $(this).data('product-id');
            var produit_qte = $(this).data('quantity');
            
            var token = "{{csrf_token()}}";
            var path = "{{route('cart.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    produit_id:produit_id,
                    produit_qte:produit_qte,
                    _token:token,
                },
                beforeSend:function(){
                    $('#add_to_cart'+produit_id).html('<i class="fa fa-spinner fa-spin"></i> Chargement...');
                },
                complete:function (){
                    $('#add_to_cart'+produit_id).html('<i class="fa fa-cart"></i>  Ajouter au panier');
                },
                success:function(data){
                    console.log(data);
                    if(data['statut']){
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                        title: "Bon travail !",
                        text: data['message'],
                        icon: "success",
                        button: "Ok",
                        });
                    }
                },
                error:function(err){
                    cosole.log(err);
                }
            });
        });
    </script>

    {{-- Wishlist --}}
    <script>
        $(document).on('click','.add_to_wishlist', function(e){
            e.preventDefault();
            var produit_id = $(this).data('id');
            var produit_qte = $(this).data('quantity');
            
            var token = "{{csrf_token()}}";
            var path = "{{route('wishlist.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    produit_id:produit_id,
                    produit_qte:produit_qte,
                    _token:token,
                },
                beforeSend:function(){
                    $('#add_to_wishlist_'+produit_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete:function (){
                    $('#add_to_wishlist_'+produit_id).html('<i class="fa fa-heart"></i>');
                },
                success:function(data){
                    console.log(data);
                    if(data['statut']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Bon travail !",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Opps !",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry !",
                            text: "Vous ne pouvez pas ajouter ce produit",
                            icon: "error",
                            button: "Ok",
                        });
                    }
                },
                error:function(err){
                    cosole.log(err);
                }
            });
        });
    </script>
@endsection