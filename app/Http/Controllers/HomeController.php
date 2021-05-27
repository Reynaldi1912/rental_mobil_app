<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function persewaan_kp()
    {
        return view('persewaan-kendaraan-pribadi');
    }
    public function persewaan_ku()
    {
        return view('persewaan-kendaraan-umum');
    }
    public function cek_sewa()
    {
        return view('cek-sewa');
    }
    public function frofile(){
        return view('frofile');
    }
    public function update_frofile(Request $request ){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
    

            $user = Auth::user();
            
            if($user->foto==NULL){
                if($request->file('foto')){
                    $image_name = $request->file('foto')->store('images', 'public');
                } 
                else {
                    $image_name = '/img/boy.png';
                }
                $user->foto = $image_name;
            }else if($user->foto != NULL){
                if($request->file('foto')){
                    if($user->foto != '/img/boy.png' && file_exists(storage_path('app/public/' . $user->foto))){
                        Storage::delete('public/' . $user->foto);
                    }
                    $image_name = $request->file('foto')->store('images', 'public');
                    $user->foto = $image_name;
                    }
            }

                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->save();

        return back();
    }
}
