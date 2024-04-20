@extends("backend.layouts.master")

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Tableau de bord</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Tableau de board</li>                        
                        </ul>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Categorie::where(['statut'=>'active'])->count()}} <i class="icon-organization float-right"></i></h3>
                            <span>Catégorie totale</span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Produit::where('statut','active')->count()}} <i class="icon-basket-loaded float-right"></i></h3>
                            <span>Produits total</span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\User::where('statut','active')->count()}} <i class="icon-user-follow float-right"></i></h3>
                            <span>Nouveaux clients</span>                    
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                            <div class="progress-bar" data-transitiongoal="67"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>512 500 <i class="float-right">CFA</i></h3>
                            <span>Bénéfice net</span>       
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                            <div class="progress-bar" data-transitiongoal="89"></div>
                        </div>
                    </div>
                </div>
                
            </div>

            {{-- <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Annual Report <small>Description text here...</small></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <span class="text-muted">Sales Report</span>
                                    <h3 class="text-warning">$4,516</h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <span class="text-muted">Annual Revenue </span>
                                    <h3 class="text-info">$6,481</h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <span class="text-muted">Total Profit</span>
                                    <h3 class="text-success">$3,915</h3>
                                </div>
                            </div>
                            <div id="area_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Income Analysis<small>8% High then last month</small></h2>
                        </div>
                        <div class="body">                            
                            <div class="sparkline-pie text-center">6,4,8</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Sales Income</h2>
                        </div>
                        <div class="body">
                            <h6>Overall <b class="text-success">7,000</b></h6>
                            <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                                data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                                data-offset="90" data-width="100%" data-height="95px" data-line-Width="1" data-line-Color="#ffcd55"
                                data-fill-Color="#ffcd55">2,4,3,1,5,7,3,2</div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Transactions récentes</h2>
                            <ul class="header-dropdown">
                                <a href="{{route('commande.index')}}" class="btn btn-sm btn-success">Tout voir</a>
                            </ul>
                        </div>
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
                                                    <a href="{{route('coupon.edit', $item->id)}}" data-toggle="tooltip" title="detail" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fa fa-eye"></i></a>
                                    
                                                    <form class="float-left ml-2" action="{{route('coupon.destroy', $item->id)}}" method="post">
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
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Top Selling Country</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="world-map-markers" class="jvector-map" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection