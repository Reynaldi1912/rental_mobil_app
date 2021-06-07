<?php

namespace App\Http\Controllers;


use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_umum;
use App\Models\kendaraan_pribadi;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;
use App\Models\detail_user;
use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;


class sewakan1Controller extends Controller
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
        $user = riwayat::all();
        return view('riwayat',['user'=>$user , 'pending_pribadi_total'=>$pending_pribadi_total , 'pending_umum_total'=>$pending_umum_total]);
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
        $user = new riwayat;

        $user->nama_kendaraan = $request->get('kendaraan');
        $user->nama_penyewa = $request->get('penyewa');
        $user->status = $request->get('status');


        $user->save();

        $destroy=sewa_kendaraan_pribadi::findOrFail($request->get('id'))->delete();

        return back();
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
