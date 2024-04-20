<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.user.index', compact('users'));
    }

    public function userStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('users')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('users')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom_complet'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'email|required|unique:users,email',
            'password'=>'min:6|required',
            'telephone'=>'string|nullable',
            'adresse'=>'string|nullable',
            'photo'=>'nullable',
            'role'=>'required|in:admin,vendeur,client',
            'statut'=>'required|in:active,inactive',
        ]);
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        // return $data;

        $statut = User::create($data);
        if($statut){
            return redirect()->route('user.index')->with('success', 'Utilisateur créée avec succès');
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
        $user = User::find($id);
        if($user){
            return view('backend.user.edit', compact(['user']));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if($user){
            $this->validate($request,[
                'nom_complet'=>'string|required',
                'username'=>'string|nullable',
                'email'=>'email|required|exists:users,email',
                'telephone'=>'string|nullable',
                'adresse'=>'string|nullable',
                'photo'=>'nullable',
                'role'=>'required|in:admin,vendeur,client',
            ]);

            $data = $request->all();

            $statut = $user->fill($data)->save();
            if($statut){
                return redirect()->route('user.index')->with('success', 'Utilisateur modifiée avec succès');
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
        $user = User::find($id);
        if($user){
            $statut = $user->delete();
            if($statut){
                return redirect()->route('user.index')->with('success', 'Utilisateur supprimée avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
