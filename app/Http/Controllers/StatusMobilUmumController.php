<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan_umum;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;



class StatusMobilUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();
        $pending_umum_total = count($sewa);
        // return $pending_umum_total;
        return view('persewaan-kendaraan-umum',['sewa'=>$sewa ,'pending_umum_total'=>$pending_umum_total]);
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
    public function update(Request $request,$id)
    {
        $request->validate([
            'status' => 'required',
            'id_sewa' => 'required',
            ]);

        $kendaraan = sewa_kendaraan_umum::all()->where('id',$request->get('id_sewa'))->first();
        $kendaraan_umum = kendaraan_umum::all()->where('id',$kendaraan->kendaraan_umum->id)->first();


        $kendaraan->status = $request->get('status');
        $kendaraan->save();

        if($kendaraan->status == 'setuju'){
            $kendaraan_umum->stok = $kendaraan_umum->stok-1;
            $kendaraan_umum->save();
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
