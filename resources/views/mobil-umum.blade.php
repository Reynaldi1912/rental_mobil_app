@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h2 class="pb-3">Zona Penyewaan Mobil <strong>Umum</strong></h2>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end row">
          <input type="text" placeholder="Cari" />
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
            &nbsp&nbsp
          <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Data</button>
      </div>
    </div>
  </div>
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
          @if(auth()->user()->level=="user")
          <button class="btn btn-primary">Detail Kendaraan</button>
          <button class="btn btn-success">Sewa Sekarang</button>
          @endif

          @if(auth()->user()->level=="admin")
          <a href="#">
            <button class="btn btn-primary">Detail</button>
          </a>
          <button class="btn btn-warning">Edit</button>
          <button class="btn btn-danger">Delete</button>
          @endif
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kendaraan</h5>
        <button class="btn btn-danger" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
      </div>
      <form>
        <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama Mobil :</label>
              <input type="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="harga">Harga :</label>
              <input type="harga" class="form-control" id="harga">
            </div>
            <div class="form-group">
              <label for="stok">Stok :</label>
              <input type="stok" class="form-control" id="stok">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
