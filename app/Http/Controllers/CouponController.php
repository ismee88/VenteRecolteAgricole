<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.index', compact('coupons'));
    }

    public function couponStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('coupons')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('coupons')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|min:2',
            'valeur' => 'required|numeric',
            'type' => 'required|in:fixe,pourcent',
            'statut' => 'required|in:active,inactive',
        ]);
        $data = $request->all();

        $statut = Coupon::create($data);
        if($statut){
            return redirect()->route('coupon.index')->with('success', 'coupon créé avec succès');
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
        $coupon = Coupon::find($id);
        if($coupon){
            return view('backend.coupon.edit', compact(['coupon']));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::find($id);
        if($coupon){
            $this->validate($request,[
                'code' => 'required|min:2',
                'valeur' => 'required|numeric',
                'type' => 'required|in:fixe,pourcent',
            ]);

            $data = $request->all();

            $statut = $coupon->fill($data)->save();
            if($statut){
                return redirect()->route('coupon.index')->with('success', 'Coupon modifié avec succès');
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
        $coupon = Coupon::find($id);
        if($coupon){
            $statut = $coupon->delete();
            if($statut){
                return redirect()->route('coupon.index')->with('success', 'Coupon supprimé avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
