<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Produit;
use App\Models\ProduitAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::orderBy('id', 'DESC')->get();
        return view('backend.produit.index', compact('produits'));
    }

    public function produitStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('produits')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('produits')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.produit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre'=>'string|required',
            'resume'=>'string|required',
            'description'=>'string|nullable',
            'return_cancellation'=>'string|nullable',
            'photo'=>'required',
            'stock'=>'numeric|required',
            'prix'=>'numeric|required',
            'reduction'=>'numeric|nullable',
            'cat_id'=>'required|exists:categories,id',
            'vendeur_id'=>'required|exists:users,id',
            'poids'=>'numeric|required',
            'condition'=>'required',
            'statut'=>'required|in:active,inactive',
        ]);

        $data = $request->all();

        $slug = Str::slug($request->input('titre'));
        $slug_count = Produit::where('slug', $slug)->count();
        if($slug_count > 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;

        $data['offre_prix'] = ($request->prix - (($request->prix * $request->reduction)/100));

        $statut = Produit::create($data);
        if($statut){
            return redirect()->route('produit.index')->with('success', 'Produit créé avec succès');
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
        $p = Produit::find($id);
        $produit = Produit::find($id);
        if($produit){
            return view('backend.produit.edit', compact('produit','p'));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::find($id);
        if($produit){
            $this->validate($request,[
                'titre'=>'string|required',
                'resume'=>'string|required',
                'description'=>'string|nullable',
                'return_cancellation'=>'string|nullable',
                'photo'=>'required',
                'stock'=>'numeric|required',
                'prix'=>'numeric|required',
                'reduction'=>'numeric|nullable',
                'cat_id'=>'required|exists:categories,id',
                'vendeur_id'=>'required|exists:users,id',
                'poids'=>'numeric|required',
                'condition'=>'required',
            ]);
            $data = $request->all();
            
            $data['offre_prix'] = ($request->prix - (($request->prix * $request->reduction)/100));

            $statut = $produit->fill($data)->save();
            if($statut){
                return redirect()->route('produit.index')->with('success', 'Produit modifié avec succès');
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
        $produit = Produit::find($id);
        if($produit){
            $statut = $produit->delete();
            if($statut){
                return redirect()->route('produit.index')->with('success', 'Produit supprimé avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
