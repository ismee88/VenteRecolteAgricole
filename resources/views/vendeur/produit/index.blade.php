@extends('vendeur.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Produit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('vendeur')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Produit</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center  m-l-15 hidden-sm">
                        <h4 class="float-right">Produit Total : {{\App\Models\Produit::where('vendeur_id',auth('vendeur')->user()->id)->count()}}</h4>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('vendeur-produit.create')}}">Créer Produit</a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @include('vendeur.layouts.notification')
        </div>

        <div class="card" style="background-color: white; padding: 20px; border-radius: 10px">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Prix d'offre</th>
                                <th>Réduction</th>
                                <th>Poids</th>
                                <th>Condition</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N.</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Prix d'offre</th>
                                <th>Réduction</th>
                                <th>Poids</th>
                                <th>Condition</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($produits as $item)
                                

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->titre}}</td>
                                    <!--<td>{!! html_entity_decode($item->description) !!}</td>-->
                                    <td>{{number_format($item->prix,2)}}  CFA</td>
                                    <td>{{number_format($item->offre_prix,2)}}  CFA</td>
                                    <td>{{$item->reduction == null ? '0' : $item->reduction}}%</td>
                                    <td>{{$item->poids}} kg</td>
                                    <td>
                                        @if ($item->condition == 'Nouveau')
                                            <span class="badge badge-success">{{$item->condition}}</span>
                                        @elseif($item->condition == 'Par default')
                                            <span class="badge badge-warning">{{$item->condition}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->statut == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#produitID{{$item->id}}" data-toggle="tooltip" title="Detail" class="float-left btn btn-sm btn-outline-info ml-2" data-placement="bottom"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('vendeur-produit.edit', $item->id)}}" data-toggle="tooltip" title="Modifier" class="float-left btn btn-sm btn-outline-warning ml-2" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                        
                                        <form class="float-left ml-2" action="{{route('vendeur-produit.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="" data-toggle="tooltip" title="Supprimer" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="produitID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="produitID{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            @php
                                                $produit = \App\Models\Produit::where('id', $item->id)->first();
                                                $photos = explode(',',$item->photo);
                                            @endphp
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="#produitID{{$item->id}}">{{\Illuminate\Support\Str::upper($produit->titre)}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <strong>Prix :</strong>
                                                            <p>{{number_format($produit->prix, 2)}} CFA</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Prix d'offre :</strong>
                                                            <p>{{number_format($produit->offre_prix, 2)}} CFA</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Réduction :</strong>
                                                            <p>{{$produit->reduction == null ? '0' : $produit->reduction}}%</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Stock :</strong>
                                                            <p>{{$produit->stock}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <strong>Categorie :</strong>
                                                            <p>{{\App\Models\Categorie::where('id',$produit->cat_id)->value('titre')}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Vendeur :</strong>
                                                            <p>{{\App\Models\User::where('id',$produit->vendeur_id)->value('nom_complet')}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Poids :</strong>
                                                            <p>{{$produit->poids}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Condition :</strong>
                                                            <p class="badge badge-primary">{{$produit->condition}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        
                                                        
                                                        <div class="col-md-3">
                                                            <strong>Statut :</strong>
                                                            @if ($produit->statut == 'active')
                                                                <p class="badge badge-success">{{$produit->statut}}</p>
                                                            @else
                                                                <p class="badge badge-danger">{{$produit->statut}}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <strong>Resumé :</strong>
                                                    <p>{!! html_entity_decode($produit->resume) !!}</p>

                                                    <strong>Description :</strong>
                                                    @if ($produit->description == null)
                                                        <p>Aucune description</p>
                                                    @else
                                                        <p>{!! html_entity_decode($produit->description) !!}</p>
                                                    @endif
                                                    
                                                    <hr>
                                                    <strong>Photo : </strong>
                                                    <div class="row mt-3">
                                                        @foreach ($photos as $photo)
                                                            <div class="col-md-4">
                                                                <img src="{{$photo}}" alt="image produit" style="max-height: 80px; max-width: 120px">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                url:"{{route('vendeur.produit.statut')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.statut){
                        alert(response.msg);
                        window.location.reload();
                    }
                    else{
                        alert('Veuillez réessayer !');
                    }
                }
            })
        })
    </script>
@endsection