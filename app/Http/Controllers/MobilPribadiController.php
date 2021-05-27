<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kendaraan_pribadi;
use Illuminate\Support\Facades\Storage;


class MobilPribadiController extends Controller
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
        $kendaraan = kendaraan_pribadi::all();
        // return $kendaraan;
        return view('mobil-pribadi' , compact('kendaraan'))
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

        $kendaraan_pribadi = new kendaraan_pribadi;

        $kendaraan_pribadi->nama = $request->get('nama');
        $kendaraan_pribadi->harga = $request->get('harga');
        $kendaraan_pribadi->stok = $request->get('stok');
        $kendaraan_pribadi->tipe_mobil = $request->get('tipe');
        $kendaraan_pribadi->jumlah_kursi = $request->get('kursi');
        $kendaraan_pribadi->transmisi = $request->get('transmisi');
        $kendaraan_pribadi->foto = $image_name;


        $kendaraan_pribadi->save();

        return redirect()->route('mobil-pribadi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $kendaraan = kendaraan_pribadi::all()->where('id',$id)->first();
        //  return $kendaraan;
         return view('detail', ['kendaraan'=>$kendaraan]);
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
        
    
            $kendaraan_pribadi = kendaraan_pribadi::all()->find($request->id);

            if($request->file('foto')){
                if($kendaraan_pribadi->foto != 'images/other.png' && file_exists(storage_path('app/public/' . $kendaraan_pribadi->foto))){
                    Storage::delete('public/' . $kendaraan_pribadi->foto);
                }
                $image_name = $request->file('foto')->store('images', 'public');
                $kendaraan_pribadi->foto = $image_name;
            }
    
            $kendaraan_pribadi->nama = $request->get('nama');
            $kendaraan_pribadi->harga = $request->get('harga');
            $kendaraan_pribadi->stok = $request->get('stok');
            $kendaraan_pribadi->tipe_mobil = $request->get('tipe');
            $kendaraan_pribadi->jumlah_kursi = $request->get('kursi');
            $kendaraan_pribadi->transmisi = $request->get('transmisi');
            // $kendaraan_pribadi->update($request->all());
            $kendaraan_pribadi->save();
   

   
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
        $kendaraan_destroy=kendaraan_pribadi::findOrFail($request->id)->delete();
        // return $kendaraan_destroy;
        return back()
        -> with('success', 'Mobil Berhasil Dihapus');
    }
}
