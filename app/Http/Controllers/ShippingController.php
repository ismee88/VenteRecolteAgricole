<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings = Shipping::orderBy('id', 'DESC')->get();
        return view('backend.shipping.index', compact('shippings'));
    }

    public function shippingStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('shippings')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('shippings')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'methode_de_livraison' => 'string|required',
            'delai_de_livraison' => 'string|required',
            'frais_de_livraison' => 'numeric|nullable',
            'statut' => 'required|in:active,inactive',
        ]);
        $data = $request->all();

        if($data['frais_de_livraison'] == null){
            $data['frais_de_livraison'] = 0;
        }
        
        $statut = Shipping::create($data);
        if($statut){
            return redirect()->route('shipping.index')->with('success', 'Expédition créé avec succès');
        }else{
            return back()->with('error', 'Quelque chose a mal tourné !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shipping = Shipping::find($id);
        if($shipping){
            return view('backend.shipping.edit', compact('shipping'));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shipping = Shipping::find($id);
        if($shipping){
            $this->validate($request,[
                'methode_de_livraison' => 'string|required',
                'delai_de_livraison' => 'string|required',
                'frais_de_livraison' => 'numeric|nullable',
            ]);

            $data = $request->all();

            if($data['frais_de_livraison'] == null){
                $data['frais_de_livraison'] = 0;
            }
            
            $statut = $shipping->fill($data)->save();
            if($statut){
                return redirect()->route('shipping.index')->with('success', 'Expédition modifié avec succès');
            }else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping = Shipping::find($id);
        if($shipping){
            $statut = $shipping->delete();
            if($statut){
                return redirect()->route('shipping.index')->with('success', 'Expédition supprimé avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
