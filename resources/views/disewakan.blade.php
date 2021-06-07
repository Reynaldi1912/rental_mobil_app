@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kendaraan</th>
      <th scope="col">Penyewa</th>
      <th scope="col">Status</th>
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

        <tr>
            <th scope="row">{{$no}}</th>
            <td>{{$sewap->kendaraan_pribadi->nama}}</td>
            <td>{{$sewap->User->name}}</td>   
            <td>{{$sewap->status}}</td>   

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

        <tr>
            <th scope="row">{{$no}}</th>
            <td>{{$sewa->kendaraan_umum->nama}}</td>
            <td>{{$sewa->User->name}}</td>
            <td>{{$sewa->status}}</td>   

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
