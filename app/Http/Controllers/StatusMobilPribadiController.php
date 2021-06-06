<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_umum;
use App\Models\kendaraan_pribadi;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;


class StatusMobilPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('status','pending')->get();
        $pending_pribadi_total = count($sewa_pribadi);
        $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();
        $pending_umum_total = count($sewa);
        // return $pending_umum_total;
        return view('persewaan-kendaraan-pribadi',['sewa_pribadi'=>$sewa_pribadi ,'pending_pribadi_total'=>$pending_pribadi_total , 'pending_umum_total'=>$pending_umum_total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'id_sewa' => 'required',
            ]);

        $kendaraan = sewa_kendaraan_pribadi::all()->where('id',$request->get('id_sewa'))->first();
        $kendaraan_pribadi = kendaraan_pribadi::all()->where('id',$kendaraan->kendaraan_pribadi->id)->first();


        $kendaraan->status = $request->get('status');
        $kendaraan->save();

        if($kendaraan->status == 'setuju'){
            $kendaraan_pribadi->stok = $kendaraan_pribadi->stok-1;
            $kendaraan_pribadi->save();
        }
       

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
