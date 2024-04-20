@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Commandes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Commande</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center  m-l-15 hidden-sm">
                        <h4 class="float-right">Commande Total : {{\App\Models\Commande::count()}}</h4>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div>
            @include('backend.layouts.notification')
        </div>

        <div class="card" style="background-color: white; padding: 20px; border-radius: 10px">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:60px;">S.N.</th>
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
                            @forelse ($commandes as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nom_complet}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->methode_paiement == "cod" ? "Paiement à la livraison" : $item->methode_paiement}}</td>
                                    <td>
                                        @if ($item->statut_paiement == "non payé")
                                            <span class="badge badge-danger">{{$item->statut_paiement}}</span>
                                        @else
                                            <span class="badge badge-success">{{$item->statut_paiement}}</span>
                                        @endif
                                    </td>
                                    <td>{{number_format($item->montant_total,2)}} CFA</td>
                                    <td>
                                        @if ($item->condition == "livree")
                                            <span class="badge badge-success">{{$item->condition}}</span>
                                        @elseif ($item->condition == "annuler")
                                            <span class="badge badge-danger">{{$item->condition}}</span>
                                        @else
                                            <span class="badge badge-warning">{{$item->condition}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('commande.show', $item->id)}}" data-toggle="tooltip" title="detail" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fa fa-eye"></i></a>
                        
                                        <form class="float-left ml-2" action="{{route('commande.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="" data-toggle="tooltip" title="Supprimer" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7">Aucune commande !</td>
                                </tr>
                            @endforelse
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