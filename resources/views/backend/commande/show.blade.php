@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div>
            @include('backend.layouts.notification')
        </div>

        <div class="card mt-5" style="background-color: white; padding: 20px; border-radius: 10px">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom Complet</th>
                                <th>Email</th>                                    
                                <th>Mode de paiement</th>                                    
                                <th>Statut de la commande</th>                                    
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$commande->nom_complet}}</td>
                                <td>{{$commande->email}}</td>
                                <td>{{$commande->methode_paiement == "cod" ? "Paiement à la livraison" : $commande->methode_paiement}}</td>
                                <td>
                                    @if ($commande->statut_paiement == "non payé")
                                        <span class="badge badge-danger">{{$commande->statut_paiement}}</span>
                                    @else
                                        <span class="badge badge-success">{{$commande->statut_paiement}}</span>
                                    @endif
                                </td>
                                <td>{{number_format($commande->montant_total,2)}} CFA</td>
                                <td>
                                    @if ($commande->condition == "livree")
                                        <span class="badge badge-success">{{$commande->condition}}</span>
                                    @elseif ($commande->condition == "annuler")
                                        <span class="badge badge-danger">{{$commande->condition}}</span>
                                    @else
                                        <span class="badge badge-warning">{{$commande->condition}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('commande.show', $commande->id)}}" data-toggle="tooltip" title="telecharger" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fa fa-download"></i></a>
                    
                                    <form class="float-left ml-2" action="{{route('commande.destroy', $commande->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" title="Supprimer" data-id="{{$commande->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.N.</th>
                                <th>Image Produit</th>                                    
                                <th>Produit</th>                                    
                                <th>Quantité</th>                                    
                                <th>Prix</th>
                                <th>Vendeur</th>
                                <th>Envoyer à l'entrepôt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commande->produits as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{$item->photo}}" alt="{{$item->titre}}" style="max-width: 80px"></td>
                                    <td>{{$item->titre}}</td>
                                    <td>{{$item->pivot->quantite}}</td>
                                    <td>{{number_format($item->offre_prix,2)}} CFA</td>
                                    <td>{{App\Models\Vendeur::where('id',$item->vendeur_id)->value('nom_complet')}}</td>
                                    <td>
                                        @if($item->pivot->envoye_a_entrepot == "Non")
                                            <i class="badge badge-danger">{{$item->pivot->envoye_a_entrepot}}</i>
                                        @else
                                            <i class="badge badge-success">{{$item->pivot->envoye_a_entrepot}}</i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-8">

                </div>
                <div class="col-4 border py-3">
                    <div class="row">
                        <div class="col-6">
                            <h6><strong>Sous Total </strong>: </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="float-right">{{number_format($commande->sous_total,2)}} CFA</h6>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <h6><strong>Frais d'expédition </strong>: </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="float-right">{{number_format($commande->frais_de_livraison,2)}} CFA</h6>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <h6><strong>Coupon </strong>: </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="float-right"> - {{number_format($commande->coupon,2)}} CFA</h6>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <h6><strong>Total </strong>: </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="float-right">{{number_format($commande->montant_total,2)}} CFA</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-1">
                        <div class="col-12">
                            <h6><strong>Statut </strong>: </h6>
                            <form action="{{route('commande.statut')}}" method="post">
                                @csrf
                                <input type="hidden" name="commande_id" value="{{$commande->id}}">
                                <select name="condition" id="" class="form-control">
                                    <option value="en attente" {{$commande->condition == 'livree' || $commande->condition == 'annuler' ? 'disabled' : ''}} {{$commande->condition == 'en attente' ? 'selected' : ''}}>En attente</option>
                                    <option value="traitement" {{$commande->condition == 'livree' || $commande->condition == 'annuler' ? 'disabled' : ''}} {{$commande->condition == 'traitement' ? 'selected' : ''}}>Traitement</option>
                                    <option value="livree" {{$commande->condition == 'annuler' ? 'disabled' : ''}} {{$commande->condition == 'livree' ? 'selected' : ''}}>Livrée</option>
                                    <option value="annuler" {{$commande->condition == 'livree' ? 'disabled' : ''}} {{$commande->condition == 'annuller' ? 'selected' : ''}}>Annuler</option>
                                </select>
                                @if($commande->condition == 'livree')
                                    <button disabled class="btn btn-success mt-3" style="padding-left: 40%; padding-right: 40%;">Mise à jour</button>
                                @else
                                    <button class="btn btn-success mt-3" style="padding-left: 40%; padding-right: 40%;">Mise à jour</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                title: "Êtes-vous sûr ?",
                text: "Une fois effacé, vous ne pourrez pas récupérer ce fichier imaginaire !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Pouf ! Votre fichier imaginaire a été supprimé !", {
                    icon: "success",
                    });
                } else {
                    swal("Votre fichier imaginaire est en sécurité !");
                }
            });
        });
    </script>

    <script>
        $('input[name=toogle]').change(function (){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            //alert(id);
            $.ajax({
                url:"{{route('coupon.statut')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.statut){
                        alert(response.msg);
                    }
                    else{
                        alert('Veuillez réessayer !');
                    }
                }
            })
        })
    </script>
@endsection