@extends('layouts.app')

@section('content')
    <div class="container border border-2 border-secondary rounded p-4">
    <div class="row">
        <div class="col">
            <h4><strong>Foto Kendaraan : </strong></h4>
            <img width="20%" src="{{asset('storage/'.$kendaraan->foto)}}">
        </div>
    </div>
    <div class="row pt-5">
        <h4><strong>Deskripsi Kendaraan</strong> :</h4>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama Kendaraan :</td>
                    <td>{{$kendaraan->nama}}</td>
                </tr>
                <tr>
                    <td>Harga Sewa :</td>
                    <td>{{$kendaraan->harga}} /Hari</td>
                </tr>
                <tr>
                    <td>Tipe Mobil :</td>
                    <td>{{$kendaraan->tipe_mobil}}</td>
                </tr>
                <tr>
                    <td>Transmisi  :</td>
                    <td>{{$kendaraan->transmisi}}</td>
                </tr>
                <tr>
                    <td>Jumlah Kursi :</td>
                    <td>{{$kendaraan->jumlah_kursi}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection
