<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_umum;
use App\Models\kendaraan_pribadi;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;
use App\Models\riwayat;
use App\Models\detail_user;

use Auth;
// use Barryvdh\DomPDF\Facade as PDF;
use \PDF;


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

    }

    public function store_umum(Request $request)
    {
        $user=Auth::user();
        $request->validate([
            'id' => 'required',
            'tanggal_pakai' => 'required',
            'sewa_hari' => 'required',
        ]);

        $pribadi = kendaraan_umum::all()->where('id',$request->get('id'))->first();


        $kendaraan_pribadi = new sewa_kendaraan_umum;

        $kendaraan_pribadi->kendaraan_umum_id = $request->get('id');
        $kendaraan_pribadi->user_id = $user->id;
        $kendaraan_pribadi->tanggal_dipakai = $request->get('tanggal_pakai');
        $kendaraan_pribadi->jumlah_hari = $request->get('sewa_hari');
        $kendaraan_pribadi->total = ($request->get('sewa_hari') * $pribadi->harga);
        $kendaraan_pribadi->status = 'pending';

        $kendaraan_pribadi->save();

        return redirect()->route('cek-sewa.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $request->validate([
            'id' => 'required',
            'tanggal_pakai' => 'required',
            'sewa_hari' => 'required',
        ]);

        $pribadi = kendaraan_pribadi::all()->where('id',$request->get('id'))->first();


        $kendaraan_pribadi = new sewa_kendaraan_pribadi;

        $kendaraan_pribadi->kendaraan_pribadi_id = $request->get('id');
        $kendaraan_pribadi->user_id = $user->id;
        $kendaraan_pribadi->tanggal_dipakai = $request->get('tanggal_pakai');
        $kendaraan_pribadi->jumlah_hari = $request->get('sewa_hari');
        $kendaraan_pribadi->total = ($request->get('sewa_hari') * $pribadi->harga);
        $kendaraan_pribadi->status = 'pending';

        $kendaraan_pribadi->save();

        return redirect()->route('cek-sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('resi');
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
    public function createPDF(Request $request) {
        // retreive all records from db
        if($request->get('mobil') == 0){
            $data = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('id',$request->get('id'))->first();
        }else if($request->get('mobil') == 1){
            $data = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('id',$request->get('id'))->first();
        }
        $user_detail = detail_user::with('user')->where('user_id',$data->user->id)->first();
        $mobil =$request->get('mobil');
  
        // share data to view
         $pdf = PDF::loadview('resi', ['data'=>$data , 'mobil'=>$mobil ,'user_detail'=>$user_detail])->stream();
        // download PDF file with download method
        // return $pdf;
        return view('resi', ['data'=>$data , 'mobil'=>$mobil, 'user_detail'=>$user_detail]);

        // return $data;
      }
}
