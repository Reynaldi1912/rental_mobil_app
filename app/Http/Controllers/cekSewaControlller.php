<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_umum;
use App\Models\kendaraan_pribadi;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;
use App\Models\riwayat;
use Auth;

class cekSewaControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $kendaraan_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi')->where('user_id',$user->id)->get();
        $kendaraan_umum= sewa_kendaraan_umum::with('kendaraan_umum')->where('user_id',$user->id)->get();

        return view('cek-sewa',['kendaraan_pribadi'=>$kendaraan_pribadi,'kendaraan_umum'=>$kendaraan_umum]);
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
        //
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
