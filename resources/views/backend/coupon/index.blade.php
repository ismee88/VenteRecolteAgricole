@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Coupon</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Coupon</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center  m-l-15 hidden-sm">
                        <h4 class="float-right">Coupon Total : {{\App\Models\Coupon::count()}}</h4>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('coupon.create')}}">Créer coupon</a>
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
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>code</th>
                                <th>type</th>
                                <th>valeur</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N.</th>
                                <th>code</th>
                                <th>type</th>
                                <th>valeur</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($coupons as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->code}}</td>
                                <td>
                                    @if ($item->type == 'fixe')
                                        <span class="badge badge-success">{{$item->type}}</span>
                                    @else
                                        <span class="badge badge-primary">{{$item->type}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->type == "fixe")
                                        {{$item->valeur}} CFA
                                    @else
                                        {{$item->valeur}}%
                                    @endif
                                </td>
                                <td>
                                    <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->statut == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{route('coupon.edit', $item->id)}}" data-toggle="tooltip" title="Modifier" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                    
                                    <form class="float-left ml-2" action="{{route('coupon.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" title="Supprimer" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
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