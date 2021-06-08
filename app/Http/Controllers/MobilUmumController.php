<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan_umum;
use Illuminate\Support\Facades\Storage;
use App\Models\sewa_kendaraan_umum;
use App\Models\sewa_kendaraan_pribadi;
use App\Models\kendaraan_pribadi;





class MobilUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  $kendaraan = kendaraan_pribadi::where([
        //     ['nama','!=',Null],
        //     [function($query)use($request){
        //         if (($term = $request->term)) {
        //             $query->orWhere('nama','LIKE','%'.$term.'%')
        //                 ->orWhere('harga','LIKE','%'.$term.'%')->get();
        //         }
        //     }]
        // ])
        // ->orderBy('id','desc')
        // ->simplePaginate(2);
        $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();


        $pending_umum_total = count($sewa);
        $sewa_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('status','pending')->get();
        $pending_pribadi_total = count($sewa_pribadi);

        $kendaraan = kendaraan_umum::all();
        // return $kendaraan;
        return view('mobil-umum' , ['kendaraan'=>$kendaraan , 'pending_umum_total'=>$pending_umum_total,'pending_pribadi_total'=>$pending_pribadi_total ])
        ->with('i',(request()->input('page',1)-1)*5);
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
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'transmisi' => 'required',
            'tipe' => 'required',
            'kursi' => 'required',
            ]);

            if($request->file('foto')){
                $image_name = $request->file('foto')->store('images', 'public');
            } else {
                $image_name = 'images/other.png';
            }

        $kendaraan_pribadi = new kendaraan_umum;

        $kendaraan_pribadi->nama = $request->get('nama');
        $kendaraan_pribadi->harga = $request->get('harga');
        $kendaraan_pribadi->stok = $request->get('stok');
        $kendaraan_pribadi->tipe_mobil = $request->get('tipe');
        $kendaraan_pribadi->jumlah_kursi = $request->get('kursi');
        $kendaraan_pribadi->transmisi = $request->get('transmisi');
        $kendaraan_pribadi->foto = $image_name;


        $kendaraan_pribadi->save();

        return redirect()->route('mobil-umum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $kendaraan = kendaraan_umum::all()->where('id',$id)->first();
         $sewa = sewa_kendaraan_umum::with('kendaraan_umum','User')->where('status','pending')->get();
         $sewa_pribadi = sewa_kendaraan_pribadi::with('kendaraan_pribadi','User')->where('status','pending')->get();
         $pending_pribadi_total = count($sewa_pribadi);
        $pending_umum_total = count($sewa);
        //  return $kendaraan;
         return view('detail', ['kendaraan'=>$kendaraan , 'pending_umum_total'=>$pending_umum_total , 'pending_pribadi_total'=>$pending_pribadi_total ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'transmisi' => 'required',
                'tipe' => 'required',
                'kursi' => 'required',
    
                ]);
        
    
            $kendaraan = kendaraan_umum::all()->find($request->id);

            if($request->file('foto')){
                if($kendaraan->foto != 'images/other.png' && file_exists(storage_path('app/public/' . $kendaraan->foto))){
                    Storage::delete('public/' . $kendaraan->foto);
                }
                $image_name = $request->file('foto')->store('images', 'public');
                $kendaraan->foto = $image_name;
            }
    
            $kendaraan->nama = $request->get('nama');
            $kendaraan->harga = $request->get('harga');
            $kendaraan->stok = $request->get('stok');
            $kendaraan->tipe_mobil = $request->get('tipe');
            $kendaraan->jumlah_kursi = $request->get('kursi');
            $kendaraan->transmisi = $request->get('transmisi');
            // $kendaraan_pribadi->update($request->all());
            $kendaraan->save();
   

   
            return back()
            ->with('success', 'Mobil Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kendaraan_destroy=kendaraan_umum::findOrFail($request->id)->delete();
        // return $kendaraan_destroy;
        return back()
        -> with('success', 'Mobil Berhasil Dihapus');
    }
}
