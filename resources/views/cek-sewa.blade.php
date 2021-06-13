@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kendaraan</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Pemesanan</th>
      <th scope="col">Tanggal Pemakaian</th>
      <th scope="col">Harga Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
  ?>
  @foreach($kendaraan_pribadi as $kp)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$kp->kendaraan_pribadi->nama}}</td>
      <td>{{$kp->status}}</td>
      <td>{{$kp->created_at->format('Y-m-d')}}</td>
      <td>{{$kp->tanggal_dipakai}}</td>
      <td>Rp.{{$kp->total}}</td>
      <td>
        @if($kp->status == 'pending')
            <a href="#">
                <button class="btn btn-secondary">Cetak Resi</button>
            </a>
        @elseif($kp->status == 'setuju')
            <a href="#">
                <button class="btn btn-primary">Cetak Resi</button>
            </a>
        @endif
      </td>
    <?php
        $i++;
    ?>
    </tr>
    @endforeach


  @foreach($kendaraan_umum as $kp)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$kp->kendaraan_umum->nama}}</td>
      <td>{{$kp->status}}</td>
      <td>{{$kp->created_at->format('Y-m-d')}}</td>
      <td>{{$kp->tanggal_dipakai}}</td>
      <td>Rp.{{$kp->total}}</td>
      <td>
        @if($kp->status == 'pending')
            <a href="#">
                <button class="btn btn-secondary">Cetak Resi</button>
            </a>
        @elseif($kp->status == 'setuju')
            <a href="#">
                <button class="btn btn-secondary">Cetak Resi</button>
            </a>
        @endif
      </td>
    <?php
        $i++;
    ?>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
