<?php

namespace App\Http\Controllers\Vendeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\Produit;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(){
    //     $commandes = Commande::orderBy('id','DESC')->get();
    //     return view('vendeur.commande.index',compact('commandes'));
    // }

    public function index()
    {
        $vendeurId = auth('vendeur')->user()->id; // ou toute autre façon d'obtenir l'ID du vendeur connecté
        // $commandes = Commande::whereHas('produits', function ($query) use ($vendeurId) {
        //     $query->whereHas('vendeur', function ($subQuery) use ($vendeurId) {
        //         $subQuery->where('id', $vendeurId);
        //     });
        // })->orderBy('id', 'DESC')->get();
        // return view('vendeur.commande.index', compact('commandes'));

        $produitCommande = CommandeProduit::where('vendeur_id',$vendeurId)->get();
        
        return view('vendeur.commande.index', compact('produitCommande'));
    }





    public function commadeStatut(Request $request){

        $commande = Commande::find($request->input('commande_id'));
        if($commande){
            if($request->input('condition') == 'livree'){
                foreach($commande->produits as $item){
                    $produit = Produit::where('id',$item->pivot->produit_id)->first();
                    $stock = $produit->stock;
                    $stock -= $item->pivot->quantite;
                    $produit->update(['stock'=>$stock]);
                    Commande::where('id',$request->input('commande_id'))->update(['statut_paiement'=>'payé']);
                }
            }
            $statut = Commande::where('id',$request->input('commande_id'))->update(['condition'=>$request->input('condition')]);
            if($statut){
                return back()->with('success','Commande mise à jour avec succès !');
            }else{
                return back()->with('error','Quelque chose a mal tourné !');
            }
        }
        abort(404);
    }

    public function commadeProduitStatut($id){
        $commandeProduit = CommandeProduit::find($id);

        if ($commandeProduit) {
            $commandeProduit->envoye_a_entrepot = 'Oui';
            $commandeProduit->save();
            
            return redirect()->back()->with('success', 'Le statut a été mis à jour avec succès');
        } else {
            return redirect()->back()->with('error', 'La commande produit n\'existe pas');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande = Commande::find($id);
        if($commande){
            $statut = $commande->delete();
            if($statut){
                return redirect()->route('commande.index')->with('success', 'Commande supprimée avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
