<table class="table table-bordered mb-30">
    <thead>
        <tr>
            <th scope="col"><i class="icofont-ui-delete"></i></th>
            <th scope="col">Image</th>
            <th scope="col">Produit</th>
            <th scope="col">Prix Unitaire</th>
            {{-- <th scope="col">Quantité</th> --}}
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)
            @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
                <tr>
                    <th scope="row">
                        <i class="icofont-close delete_wishlist" data-id="{{$item->rowId}}"></i>
                    </th>
                    <td>
                        <img src="{{$item->model->photo}}" alt="Product">
                    </td>
                    <td>
                        <a href="{{route('detail.produit',$item->model->slug)}}">{{$item->name}}</a>
                    </td>
                    <td>{{number_format($item->price,1)}} CFA</td>
                    {{-- <td>
                        <div class="quantity">
                            <input type="number" class="qty-text" id="qty2" step="1" min="1" max="99" name="quantity" value="1">
                        </div>
                    </td> --}}
                    <td><a href="javascript:void(0);" data-id="{{$item->rowId}}" class="move-to-cart btn btn-primary btn-sm">Ajouter au panier</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">vous n'avez aucun produit ajouté au favoris !</td>
            </tr>
        @endif
    </tbody>
</table>