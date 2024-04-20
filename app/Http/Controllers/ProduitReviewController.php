<?php

namespace App\Http\Controllers;

use App\Models\ProduitReview;
use Illuminate\Http\Request;

class ProduitReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function produitReview(Request $request, $slug){
        $this->validate($request,[
            'rate'=>'required|numeric',
            'raison'=>'nullable|string',
            'review'=>'nullable|string',
        ]);

        $data = $request->all();
        $statut = ProduitReview::create($data);
        if($statut){
            return back()->with('success','Merci pour votre retour.');
        }else{
            return back()->with('error','Veuillez réessayer !');
        }
    }

    public function index()
    {
        //
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
        //
    }
}
