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
                        <h5>Details produit</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                            @php $cat_slug = App\Models\Categorie::where('id',$produit->cat_id)->value('slug') @endphp
                            <li class="breadcrumb-item"><a href="{{route('categorie.produit',$cat_slug)}}">{{\App\Models\Categorie::where('id',$produit->cat_id)->value('titre')}}</a></li>
                            <li class="breadcrumb-item active">Details produit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- Single Product Details Area -->
        <section class="single_product_details_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
    
                                <!-- Carousel Inner -->
                                <div class="carousel-inner">
                                    @php
                                            $photos = explode(',',$produit->photo);
                                    @endphp
                                    @foreach ($photos as $key => $photo)
                                        <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                            <a class="gallery_img" href="{{$photo}}" title="{{$produit->titre}}">
                                                <img class="d-block w-100" src="{{$photo}}" alt="{{$produit->titre}}">
                                            </a>
                                            <!-- Product Badge -->
                                            @if($produit->condition == "Nouveau")
                                                <div class="product_badge">
                                                    <span>{{$produit->condition}}</span>
                                                </div>
                                            @else
                                                
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
    
                                <!-- Carosel Indicators -->
                                <ol class="carousel-indicators">
                                    @php
                                            $photos = explode(',',$produit->photo);
                                    @endphp
                                    @foreach ($photos as $key => $photo)
                                        <li class="{{$key==0 ? 'active' : ''}}" data-target="#product_details_slider" data-slide-to="{{$key}}" style="background-image: url({{$photo}});">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product Description -->
                    <div class="col-12 col-lg-6">
                        <div class="single_product_desc">
                            <h4 class="title mb-2">{{$produit->titre}}</h4>
                            <div class="single_product_ratings mb-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="text-muted">(8 Reviews)</span>
                            </div>
                            @if ($produit->reduction != null)
                                <h4 class="price mb-4">{{number_format($produit->offre_prix,2)}} CFA  <span>{{number_format($produit->prix,2)}} CFA</span></h4>
                            @else
                                <h4 class="price mb-4">{{number_format($produit->offre_prix,2)}} CFA</h4>
                            @endif
    
                            <!-- Overview -->
                            <div class="short_overview mb-4">
                                <h6>Résumé</h6>
                                <p>{!! html_entity_decode($produit->resume) !!}</p>
                            </div>
    
                            <!-- Color Option -->
                            {{-- <div class="widget p-0 color mb-3">
                                <h6 class="widget-title">Color</h6>
                                <div class="widget-desc d-flex">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label black" for="customRadio1"></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label pink" for="customRadio2"></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label red" for="customRadio3"></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label purple" for="customRadio4"></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label white" for="customRadio5"></label>
                                    </div>
                                </div>
                            </div> --}}
    
                            {{-- <!-- Size Option -->
                            @if($produit->taille != null)
                                <div class="widget p-0 size mb-3">
                                    <h6 class="widget-title">Size</h6>
                                    <div class="widget-desc" style="display: block; width: 45%;">
                                        @php
                                            $produit_attr = \App\Models\ProduitAttribute::where('produit_id',$produit->id)->get();
                                        @endphp
                                        <select name="size" id="">
                                            @foreach ($produit_attr as $size)
                                                <option value="{{$size->taille}}">{{$size->taille}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif --}}
    
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix my-5 d-flex flex-wrap align-items-center" method="post">
                                <div class="quantity">
                                    <input type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12" name="quantity" value="1">
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart</button>
                            </form>
    
                            <!-- Others Info -->
                            <div class="others_info_area mb-3 d-flex flex-wrap">
                                <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
                                <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i> COMPARE</a>
                                <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i> SHARE WITH FRIEND</a>
                            </div>
    
                            <!-- Size Guide -->
                            @if($produit->size_guide != null)
                                <div class="sizeguide mt-5">
                                    <h6>Guide des tailles</h6>
                                    <div class="size_guide_thumb d-flex">
                                        @php
                                            $size_guide = explode(',',$produit->size_guide)
                                        @endphp
                                        
                                        @foreach ($size_guide as $sg)
                                            <a class="size_guide_img" href="{{$sg}}" style="background-image: url({{$sg}});">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_details_tab section_padding_100_0 clearfix">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                                <li class="nav-item">
                                    <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Commentaires <span class="text-muted">({{\App\Models\ProduitReview::where(['produit_id'=>$produit->id,'statut'=>'accepter'])->count()}})</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Retour &amp; Annulation</a>
                                </li>
                            </ul>
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="description">
                                    <div class="description_area">
                                        <h5>Description</h5>
                                        @if($produit->description != null)
                                            <p>{!! html_entity_decode($produit->description) !!}</p>
                                        @else
                                            <p>Aucune description pour ce produit</p>
                                        @endif
                                    </div>
                                </div>
    
                                <div role="tabpanel" class="tab-pane fade" id="reviews">
                                    <div class="submit_a_review_area mt-50">
                                        <h4>Soumettre un avis</h4>
                                        @auth
                                        <form action="{{route('produit.review',$produit->slug)}}" method="post">
                                            @csrf
                                            <div class="form-group mt-4">
                                                <span>Votre appréciations</span>
                                                <div class="stars">
                                                    <input type="radio" name="rate" class="star-1" id="star-1" value="1">
                                                    <label class="star-1" for="star-1">1</label>
                                                    <input type="radio" name="rate" class="star-2" id="star-2" value="2">
                                                    <label class="star-2" for="star-2">2</label>
                                                    <input type="radio" name="rate" class="star-3" id="star-3" value="3">
                                                    <label class="star-3" for="star-3">3</label>
                                                    <input type="radio" name="rate" class="star-4" id="star-4" value="4">
                                                    <label class="star-4" for="star-4">4</label>
                                                    <input type="radio" name="rate" class="star-5" id="star-5" value="5">
                                                    <label class="star-5" for="star-5">5</label>
                                                    <span></span>
                                                </div>
                                                @error('rate')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                <input type="hidden" name="produit_id" value="{{$produit->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="options">Raison de votre évaluation</label>
                                                <select class="form-control small right py-0 w-100 mb-4" id="options" name="raison">
                                                    <option value="qualite" {{old('raison') == 'qualite' ? 'selected' : ''}}>Qualité</option>
                                                    <option value="valeur" {{old('raison') == 'valeur' ? 'selected' : ''}}>Valeur</option>
                                                    <option value="design" {{old('raison') == 'design' ? 'selected' : ''}}>Design</option>
                                                    <option value="prix" {{old('raison') == 'prix' ? 'selected' : ''}}>Prix</option>
                                                    <option value="autres" {{old('raison') == 'autres' ? 'selected' : ''}}>Autres</option>
                                                </select>
                                                @error('raison')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="comments">Commentaires</label>
                                                <textarea class="form-control" name="review" id="comments" rows="5" data-max-length="150"></textarea>
                                                @error('review')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Soumettre l'avis</button>
                                        </form>
                                        @else
                                            <p class="py-5">Vous devez vous connecter pour commenter <a href="{{route('user.login')}}">cliquez ici ! </a>pour vous connecter</p>
                                        @endif
                                    </div>
                                    <div class="reviews_area mt-4">
                                        @php
                                            $reviews = \App\Models\ProduitReview::where(['produit_id'=>$produit->id, 'statut'=>'accepter'])->latest()->get();
                                        @endphp
                                        <ul>
                                            @if (count($reviews) > 0)
                                                @foreach ($reviews as $review)
                                                    <li>
                                                        <div class="single_user_review mb-15">
                                                            <div class="review-rating">
                                                                @for ($i=0; $i<5; $i++)
                                                                    @if($review->rate>$i)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    @endif
                                                                @endfor
                                                                
                                                                <span>Raison : {{$review->raison}}</span>
                                                            </div>
                                                            <div class="review-details">
                                                                <p>par <a href="#">{{\App\Models\User::where('id',$review->user_id)->value('nom_complet')}}</a> le <span>{{\Carbon\Carbon::parse($review->created_at)->format('d M y')}}</span></p>
                                                                <p>{{$review->review}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
    
                                <div role="tabpanel" class="tab-pane fade" id="refund">
                                    <div class="refund_area">
                                        <h6>Politique de retour</h6>
                                        @if($produit->description != null)
                                            <p>{!! html_entity_decode($produit->return_cancellation) !!}</p>
                                        @else
                                            <p>Aucune politique de retoure pour ce produit</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Product Details Area End -->
    
        <!-- Related Products Area -->
        <section class="you_may_like_area section_padding_0_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading new_arrivals">
                            <h5>Vous pouvez aussi aimer</h5>
                        </div>
                    </div>
                </div>
                @if(count($produit->rel_prods) > 0)
                    <div class="row">
                        <div class="col-12">
                            <div class="you_make_like_slider owl-carousel">
                                <!-- Single Product -->
                                @foreach ($produit->rel_prods as $item)
                                    @if($item->id != $produit->id)
                                        <div class="single-product-area">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                @php
                                                    $photos = explode(',',$item->photo);
                                                @endphp
                                                <img class="normal_img" src="{{$photos[0]}}" alt="{{$item->titre}}">
                                                {{-- <img class="hover_img" src="{{$photos[0]}}" alt="{{$item->titre}}"> --}}
                
                                                <!-- Product Badge -->
                                                @if($item->condition == "Nouveau")
                                                    <div class="product_badge">
                                                        <span>{{$item->condition}}</span>
                                                    </div>
                                                @else
                                                    
                                                @endif
                
                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                                </div>
                
                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="compare.html"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>
                
                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                                                </div>
                
                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Voir</a>
                                                </div>
                
                                                <p class="brand_name">{{\App\Models\Categorie::where('id',$item->cat_id)->value('titre')}}</p>
                                                <a href="{{route('detail.produit',$item->slug)}}">{{$item->titre}}</a>
                                                @if ($item->reduction != null)
                                                    <h6 class="product-price">{{number_format($item->offre_prix,2)}} CFA <small><del class="text-danger">{{number_format($item->prix,2)}} CFA</del></small></h6>
                                                @else
                                                    <h6 class="product-price">{{number_format($item->offre_prix,2)}} CFA</h6>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Related Products Area -->

@endsection

@section('styles')
    <style>
        .nice-select{
            float: none;
        }

        .widget.size .widget.desc li{
            display: block;
        }

        .nice-select.open .list{
            width: 100%;
        }

        .widget.size .widget-desc li {
            display: block;
            margin-top: 4px;
        }
    </style>
@endsection