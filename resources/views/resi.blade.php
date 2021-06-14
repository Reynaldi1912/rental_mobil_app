<html>
    <head>
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/ruang-admin.min.css" rel="stylesheet">
    </head>
    <body onload="window.print();">
        <div class="container-fluid">
            <h4 class="text-primary mt-5"><strong>Rincian Transaksi</strong></h4>
            <hr style="border-color:blue">
            <div class="row mt-5">
                <div class="col-8 text-center border border-2">
                    <h4 class="text-center mt-5">Total Pembayaran</h4>
                    <h4><strong>Rp.{{$data->total}}</strong></h4>
                </div>
                <div class="col-4">
                    <table class="table table-hover">
                        <thead>
                            <tr style="background-color:#DEFFFA">
                                <th scope="col"><h4 class="text-primary"><strong>Detail Pembayaran</strong></h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col text-start">
                                            <p>Metode Pembayaran</p>
                                        </div>
                                        <div class="col">
                                            <p class="text-right">Bayar Ditempat</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col text-start">
                                            <p>Harga Sewa /hari</p>
                                        </div>
                                        <div class="col">
                                        @if($mobil == 1)
                                            <p class="text-right">Rp.{{$data->kendaraan_pribadi->harga}}</p>
                                        @elseif($mobil ==0 )
                                            <p class="text-right">Rp.{{$data->kendaraan_umum->harga}}</p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-start">
                                            <p>Jumlah Hari Sewa</p>
                                        </div>
                                        <div class="col">
                                            <p class="text-right">{{$data->jumlah_hari}} Hari</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col text-start">
                                            <p>Total Pembayaran</p>
                                        </div>
                                        <div class="col">
                                            <p class="text-right">Rp.{{$data->total}}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row border p-2" style="background-color:#DEFFFA">
                <div class="col">
                    Nomor Pesanan : 194172{{$data->id}}
                </div>
                <div class="col text-right">
                    Dipesan pada tanggal {{$data->created_at->format('Y-m-d')}}
                </div>
            </div>

            <div class="row border border-2 mt-3 p-2">
                <div class="col">  
                    DESKRIPSI KENDARAAN
                    <hr> 
                    @if($mobil == 1)
                        <h5><strong>{{$data->kendaraan_pribadi->nama}}</strong></h5>
                        <p>Type Kendaraan : {{$data->kendaraan_pribadi->tipe_mobil}}</p>
                        <p>Digunakan Tanggal {{$data->tanggal_dipakai}} dengan penyewaan mobil {{$data->jumlah_hari}} hari</p>
                    @elseif($mobil == 0)
                        <h5><strong>{{$data->kendaraan_umum->nama}}</strong></h5>
                        <p>Type Kendaraan : {{$data->kendaraan_umum->tipe_mobil}}</p>
                        <p>Digunakan Tanggal {{$data->tanggal_dipakai}} dengan penyewaan kendaraan {{$data->jumlah_hari}} hari</p>
                    @endif
                </div>
                <div class="col">  
                    DESKRIPSI PENYEWA
                    <hr> 
                    <h5><strong>{{$user_detail->nama_lengkap}}</strong></h5>
                    <p>NIK : {{$user_detail->nik}}</p>
                    <p>Alamat : {{$user_detail->alamat_lengkap}}</p>
                </div>
            </div>
            <div class="container-fluid pt-1" style="background-color:#DEFFFA">
                <p class="text-center">RESI INI DISIMPAN DAN DIBERIKAN KE ADMIN SAAT PENGAMBILAN MOBIL <br> <strong>RESI INI BERLAKU HINGGA {{$data->tanggal_dipakai}}</strong></p>
            </div>

        </div>
    </body>
</html>
