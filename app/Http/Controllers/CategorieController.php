<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::orderBy('id', 'DESC')->get();
        return view('backend.categorie.index', compact('categories'));
    }

    public function categorieStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('categories')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('categories')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titre' => 'string|required',
            'photo' => 'required',
            'resume' => 'string|nullable',
            'statut' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        $slug = Str::slug($request->input('titre'));
        $slug_count = Categorie::where('slug', $slug)->count();
        if($slug_count > 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;

        $statut = Categorie::create($data);
        if($statut){
            return redirect()->route('categorie.index')->with('success', 'Categorie créée avec succès');
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
        $categorie = Categorie::find($id);
        if($categorie){
            return view('backend.categorie.edit', compact(['categorie']));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request)->all();

        $categorie = Categorie::find($id);
        if($categorie){
            $this->validate($request,[
                'titre' => 'string|required',
                'photo' => 'required',
                'resume' => 'string|nullable',
            ]);

            $data = $request->all();

            $statut = $categorie->fill($data)->save();
            if($statut){
                return redirect()->route('categorie.index')->with('success', 'Categorie modifiée avec succès');
            }else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);
        if($categorie){
            $statut = $categorie->delete();
            if($statut){
                return redirect()->route('categorie.index')->with('success', 'Categorie supprimée avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    public function getChildByParentID(Request $request, $id){
        $categorie = Categorie::find($request->id);
        if($categorie){
            $child_id = Categorie::getChildByParentID($request->id);
            if(count($child_id) <= 0){
                return response()->json(['statut'=>false, 'data'=>null, 'msg'=>'']);
            }
            return response()->json(['statut'=>true, 'data'=>$child_id, 'msg'=>'']);
        }
        else{
            return response()->json(['statut'=>false, 'data'=>null, 'msg'=>'Catégorie non trouvée']);
        }
    }
}
