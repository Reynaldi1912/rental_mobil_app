@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kendaraan</th>
      <th scope="col">Penyewa</th>
      <th scope="col">Tanggal Dipakai</th>

      <th scope="col">Status</th>
      <th scope="col">Harga Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $no =1;
      ?>
    
      @foreach($sewa_pribadi1 as $sewap)
      <form method="post" action="{{ route('sewa1.store',1) }}">
        @csrf
        <input type="hidden" value="{{$sewap->id}}" name="id">

        <input type="hidden" value="{{$sewap->kendaraan_pribadi->nama}}" name="kendaraan">
        <input type="hidden" value="{{$sewap->User->name}}" name="penyewa">
        <input type="hidden" value="{{$sewap->status}}" name="status">
        <input type="hidden" value="{{$sewap->tanggal_dipakai}}" name="tgl_pinjam">


        <tr>
            <th scope="row">{{$no}}</th>
            <td>{{$sewap->kendaraan_pribadi->nama}}</td>
            <td>{{$sewap->User->name}}</td>   
            <td>{{$sewap->tanggal_dipakai}}</td>
            <?php
            $harga_total = ($sewap->jumlah_hari) * ($sewap->kendaraan_pribadi->harga);
            ?>
            <input type="hidden" value="{{$harga_total}}" name="biaya">\

            <td>{{$sewap->status}}</td>   
            <td>Rp.{{$harga_total}}</td>   
            <td>
                <button class="btn btn-warning" type="submit">Selesai</button>
            </td>        
        </tr>
        <?php
            $no++;
        ?>
    </form>  
    @endforeach

    @foreach($sewa1 as $sewa)
      <form method="post" action="{{ route('sewa.store',1) }}">
        @csrf
        <input type="hidden" value="{{$sewa->id}}" name="id">

        <input type="hidden" value="{{$sewa->kendaraan_umum->nama}}" name="kendaraan">
        <input type="hidden" value="{{$sewa->User->name}}" name="penyewa">
        <input type="hidden" value="{{$sewa->status}}" name="status">
        <input type="hidden" value="{{$sewa->tanggal_dipakai}}" name="tgl_pinjam">

        <tr>
            <th scope="row">{{$no}}</th>
            <td>{{$sewa->kendaraan_umum->nama}}</td>
            <td>{{$sewa->User->name}}</td>
            <td>{{$sewa->tanggal_dipakai}}</td>
           
            <?php

              $harga_total = ($sewa->jumlah_hari) * ($sewa->kendaraan_umum->harga);
            ?>
            <input type="hidden" value="{{$harga_total}}" name="biaya">
            <td>{{$sewa->status}}</td>  
            <td>Rp.{{$harga_total}}</td>   

            <td>
                <button class="btn btn-warning" type=submit>Selesai</button>
            </td>   
        </tr>

        <?php
            $no++;
        ?>
    </form>  
    @endforeach
  </tbody>
</table>
@endsection
