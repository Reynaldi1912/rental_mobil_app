@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kendaraan</th>
      <th scope="col">Penyewa</th>
      <th scope="col">Stok</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $no =1;
      ?>
    
      @foreach($sewa_pribadi as $sewa)
      <form method="post" action="{{ route('kendaraan-pribadi.update',1) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" value="{{$sewa->id}}" name="id_sewa">
        <tr>
            <th scope="row">{{$no}}</th>
            <td><a href="{{ route('mobil-pribadi.show',$sewa->kendaraan_pribadi->id) }}">{{$sewa->kendaraan_pribadi->nama}}</a></td>
            <td><a href="#">{{$sewa->user->name}}</a></td>
            <td>{{$sewa->kendaraan_pribadi->stok}}</td>
            <td>
                <div class="box">
                    <select name="status">
                        <option value="pending">Pending</option>
                        <option value="batal">Batalkan</option>
                        <option value="setuju">Setuju</option>
                    </select>
                    <button  class="btn btn-outline-primary" type=submit><i class="fas fa-save"></i></button>
                </div>
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
