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
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cek_resi">Cetak Resi</button>
            </a>
        @elseif($kp->status == 'setuju')
        <form method="get" action="{{ route('cetak')}}" >
        @csrf
              <input type="hidden" name="mobil" value=1>
              <input type="hidden" name="id" value={{$kp->id}}>
                <button class="btn btn-primary" type="submit">Cetak Resi</button>
        </form>
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
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cek_resi">Cetak Resi</button>
            </a>
        @elseif($kp->status == 'setuju')
        <form method="get" action="{{ route('cetak')}}" >
        @csrf
              <input type="hidden" name="mobil" value=0>
              <input type="hidden" name="id" value={{$kp->id}}>
                <button class="btn btn-primary" type="submit">Cetak Resi</button>
        </form>
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



 <!-- Modal sewa-->
 <div class="modal fade" id="cek_resi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
      </div>
      <div class="modal-body">
        Permintaan Anda Masih Berstatus Pending , Silahkan Tunggu Hingga Disetujui Oleh Admin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>