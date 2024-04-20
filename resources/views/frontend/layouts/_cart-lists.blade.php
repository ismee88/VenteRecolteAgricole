<div class="col-12">
    <div class="cart-table">
        <div class="table-responsive">
            <table class="table table-bordered mb-30" >
                <thead>
                    <tr>
                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                        <th scope="col">Image</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() > 0)
                        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                            <tr>
                                <th scope="row">
                                    <i class="icofont-close cart_delete" data-id="{{$item->rowId}}"></i>
                                </th>
                                <td>
                                    <img src="{{$item->model->photo}}" alt="Produit">
                                </td>
                                <td>
                                    <a href="{{route('detail.produit',$item->model->slug)}}">{{$item->name}}</a>
                                </td>
                                <td>{{number_format($item->price,1)}} CFA</td>
                                <td>
                                    <div class="quantity">
                                        <input type="number" data-id="{{$item->rowId}}" class="qty-text" id="qty-input-{{$item->rowId}}" step="1" min="1" max="99" name="quantity" value="{{$item->qty}}">
                                        <input type="hidden" data-id="$item->rowID" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">
                                    </div>
                                </td>
                                <td>{{$item->subtotal()}} CFA</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="6">Votre panier est vide !!</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 col-lg-6">
    <div class="cart-apply-coupon mb-30">
        <h6>Vous avez un coupon ?</h6>
        <p>Saisissez votre coupon ici &amp; bénéficiez de remises exceptionnelles !</p>
        <!-- Form -->
        <div class="coupon-form">
            <form action="{{route('coupon.add')}}" id="coupon-form" method="post">
                @csrf
                <input type="text" class="form-control" name="code" placeholder="Saisissez votre coupon">
                <button type="submit" class="btn btn-primary coupon-btn">Appliquer le coupon</button>
            </form>
        </div>
    </div>
</div>

<div class="col-12 col-lg-5">
    <div class="cart-total-area mb-30">
        <h5 class="mb-3">Totaux du panier</h5>
        <div class="table-responsive">
            <table class="table mb-3">
                <tbody>
                    <tr>
                        <td>Sous Total</td>
                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} CFA</td>
                    </tr>
                    <tr>
                        <td>Réduction</td>
                        <td>
                            @if(Session::get('coupon'))
                                - {{number_format(Session::get('coupon')['valeur'],2)}} CFA
                            @else
                                - 0 CFA
                            @endif
                        </td>
                    </tr>
                    {{-- <tr>
                        <td>TVA (10%)</td>
                        <td>$5.60</td>
                    </tr> --}}
                    <tr>
                        <td>Total</td>
                        @if (Session::has('coupon'))
                            <td>{{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-Session::get('coupon')['valeur'],2)}} CFA</td>
                        @else
                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} CFA</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{route('checkout1')}}" class="btn btn-primary d-block">Passer à la caisse</a>
    </div>
</div>