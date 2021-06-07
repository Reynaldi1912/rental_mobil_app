@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kendaraan</th>
      <th scope="col">Penyewa</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Selesai</th>

    
  </thead>
  <tbody>
      <?php
        $no =1;
      ?>
    
      @foreach($user as $user)
        <tr>
            <th scope="row">{{$no}}</th>
            <td>{{$user->nama_kendaraan}}</td>
            <td>{{$user->nama_penyewa}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
        <?php
            $no++;
        ?>
    </form>  
    @endforeach
  </tbody>
</table>
@endsection
