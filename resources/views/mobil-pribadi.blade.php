@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <table class="table table-striped table-hover">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">No</th>
        <th scope="col">Nama Mobil</th>
        <th scope="col">Harga Sewa</th>
        <th scope="col">Ready Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Toyota Avanza</td>
        <td>200.000 /Hari</td>
        <td>5 Kendaraan</td>
        <td>
          <button class="btn btn-primary">Detail Kendaraan</button>
          <button class="btn btn-success">Sewa Sekarang</button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Toyota Avanza</td>
        <td>200.000 /Hari</td>
        <td>5 Kendaraan</td>
        <td>
          <button class="btn btn-primary">Detail Kendaraan</button>
          <button class="btn btn-success">Sewa Sekarang</button>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Toyota Avanza</td>
        <td>200.000 /Hari</td>
        <td>5 Kendaraan</td>
        <td>
          <button class="btn btn-primary">Detail Kendaraan</button>
          <button class="btn btn-success">Sewa Sekarang</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
