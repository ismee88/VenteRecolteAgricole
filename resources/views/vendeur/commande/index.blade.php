@extends('vendeur.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Commandes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('vendeur')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Commande</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center  m-l-15 hidden-sm">
                        <h4 class="float-right"></h4>
                    </div>
                    <div>
                        
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
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:60px;">S.N.</th>
                                <th>Image Produit</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Envoyer à l'entrepôt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produitCommande as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{\App\Models\Produit::where('id',$item->produit_id)->value('photo')}}" alt="{{\App\Models\Produit::where('id',$item->produit_id)->value('titre')}}" style="max-width: 80px"></td>
                                    <td>{{\App\Models\Produit::where('id',$item->produit_id)->value('titre')}}</td>
                                    <td>{{$item->quantite}}</td>
                                    <td>{{number_format(App\Models\Produit::where('id',$item->produit_id)->value('offre_prix'),2)}} CFA</td>
                                    <td>
                                        @if($item->envoye_a_entrepot == "Non")
                                            <i class="badge badge-danger">{{$item->envoye_a_entrepot}}</i>
                                        @else
                                            <i class="badge badge-success">{{$item->envoye_a_entrepot}}</i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('vendeur.commande.produit.statut',$item->id)}}" method="post">
                                            @csrf
                                            @if($item->envoye_a_entrepot == "Non")
                                                <button class="btn btn-success" type="submit">Marquer comme envoyé</button>
                                            @else
                                                <button class="btn btn-secondary" type="submit" disabled>Déjà envoyé</button>
                                            @endif
                                        </form>
                                    </td>                   
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