<!-- Single Product -->

    @foreach ($produits as $item)
        <div class="col-9 col-sm-6 col-md-4 col-lg-3">
            <div class="single-product-area mb-30">
                <div class="product_image">
                    @php
                        $photo = explode(',',$item->photo);
                    @endphp
                    <!-- Product Image -->
                    <img class="normal_img" src="{{$photo[0]}}" alt="{{$item->titre}}" style="width: 300px; height: 250px;">
                    <!--<img class="hover_img" src="" alt="{{$item->titre}}">-->

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

                    <!-- Compare -->
                    <div class="product_compare">
                        <a href="compare.html"><i class="icofont-exchange"></i></a>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="product_description">
                    <!-- Add to cart -->
                    <div class="product_add_to_cart">
                        <a href="#" data-quantity="1" data-product-id="{{$item->id}}" class="add_to_cart" id="add_to_cart{{$item->id}}"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                    </div>

                    <!-- Quick View -->
                    <div class="product_quick_view">
                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Voir</a>
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