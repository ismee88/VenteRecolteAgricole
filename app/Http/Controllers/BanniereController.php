<?php

namespace App\Http\Controllers;

use App\Models\Banniere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BanniereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannieres = Banniere::orderBy('id', 'DESC')->get();
        return view('backend.banniere.index', compact('bannieres'));
    }

    public function banniereStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('bannieres')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('bannieres')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banniere.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titre' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'required',
            'condition' => 'required|in:banniere,promo',
            'statut' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        $slug = Str::slug($request->input('titre'));
        $slug_count = Banniere::where('slug', $slug)->count();
        if($slug_count > 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $statut = Banniere::create($data);
        if($statut){
            return redirect()->route('banniere.index')->with('success', 'Bannière créée avec succès');
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
        $banniere = Banniere::find($id);
        if($banniere){
            return view('backend.banniere.edit', compact('banniere'));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banniere = Banniere::find($id);
        if($banniere){
            $this->validate($request,[
                'titre' => 'string|required',
                'description' => 'string|nullable',
                'photo' => 'required',
                'condition' => 'required|in:banniere,promo',
            ]);
            $data = $request->all();
            
            $statut = $banniere->fill($data)->save();
            if($statut){
                return redirect()->route('banniere.index')->with('success', 'Bannière modifiée avec succès');
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
        $banniere = Banniere::find($id);
        if($banniere){
            $statut = $banniere->delete();
            if($statut){
                return redirect()->route('banniere.index')->with('success', 'Bannière supprimée avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
