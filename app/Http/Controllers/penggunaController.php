<?php

namespace App\Http\Controllers;

use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_umum;
use App\Models\kendaraan_pribadi;
use App\Models\sewa_kendaraan_umum;
use App\Models\User;
use App\Models\detail_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class penggunaController extends Controller
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
        return view('pengguna',['sewa_pribadi'=>$sewa_pribadi ,'pending_pribadi_total'=>$pending_pribadi_total , 'pending_umum_total'=>$pending_umum_total]);
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
        $sewa_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('status','pending')->get();
        $pending_pribadi_total = count($sewa_pribadi);
        $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();
        $pending_umum_total = count($sewa);

        $user = Auth::user();
        $pengguna = detail_user::all()->where('user_id',$id)->first();
        $validation = detail_user::all();

            $total = count($validation);
            $valid;

                for($i = 0; $i < $total ; $i++){
                    if($validation[$i]->user_id == $user->id){
                        $valid=0;
                        break;
                    }else{
                        $valid=1;
                    }
                }

        // return $pengguna;
        return view ('detailPengguna',['pengguna'=>$pengguna ,'pending_pribadi_total'=>$pending_pribadi_total , 'pending_umum_total'=>$pending_umum_total, 'valid'=>$valid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewa_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('status','pending')->get();
        $pending_pribadi_total = count($sewa_pribadi);
        $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();
        $pending_umum_total = count($sewa);

        $user = Auth::user();
        $pengguna = detail_user::all()->where('user_id',$id)->first();
        $validation = detail_user::all();

            $total = count($validation);
            $valid;

                for($i = 0; $i < $total ; $i++){
                    if($validation[$i]->user_id == $user->id){
                        $valid=0;
                        break;
                    }else{
                        $valid=1;
                    }
                }

        // return $pengguna;
        return view ('edit_data',['pengguna'=>$pengguna ,'pending_pribadi_total'=>$pending_pribadi_total , 'pending_umum_total'=>$pending_umum_total,'valid' =>$valid]);
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
            'nama' => 'required',
            'jk' => 'required',
            'al' => 'required',
            'hp' => 'required',
            'nik' => 'required',
            ]);
    

            $pengguna= Auth::user();
            $validation = detail_user::all();

            $total = count($validation);
            $valid;

                for($i = 0; $i < $total ; $i++){
                    if($validation[$i]->user_id == $pengguna->id){
                        $valid=0;
                        break;
                    }else{
                        $valid=1;
                    }
                }

                if($valid == 0){
                    $user = detail_user::all()->where('user_id',$pengguna->id)->first();
                    
                    $user->nama_lengkap = $request->get('nama');
                    $user->jenis_kelamin = $request->get('jk');
                    $user->alamat_lengkap = $request->get('al');
                    $user->no_hp = $request->get('hp');
                    $user->nik = $request->get('nik');


                    if($request->file('ktp')){
                        if($user->ktp != '/img/boy.png' && file_exists(storage_path('app/public/' . $user->ktp))){
                            Storage::delete('public/' . $user->ktp);
                        }

                        $image_name = $request->file('ktp')->store('images', 'public');
                        $user->ktp = $image_name;
                    }
                }else if($valid == 1){

                    $user = new detail_user;

                    if($request->file('ktp')){
                        $image_name = $request->file('ktp')->store('images', 'public');
                    } 
                    else {
                        $image_name = '/img/boy.png';
                    }
                    $user->ktp = $image_name;
                    $user->nama_lengkap = $request->get('nama');
                    $user->jenis_kelamin = $request->get('jk');
                    $user->alamat_lengkap = $request->get('al');
                    $user->no_hp = $request->get('hp');
                    $user->nik = $request->get('nik');
                    $user->user_id = $pengguna->id;

                }
              

                $user->save();

                return redirect()->route('pengguna.show',$id);

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
