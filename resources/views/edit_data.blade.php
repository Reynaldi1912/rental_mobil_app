@extends('layouts.app')

@section('content')
@if($valid == 1)
<form method="post" action="{{ route('pengguna.update', auth()->user()->id) }}" enctype="multipart/form-data">
        <div class="modal-body" >
          @csrf
          @method('PATCH')
            <div class="form-group">
              <label for="nama">Nama Lengkap :</label>
              <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="nik">NIK :</label>
              <input type="text" name="nik" class="form-control" id="nik">
            </div>
            <div class="form-group">
              <label for="tipe">Jenis Kelamin</label>
              <select name="jk" class="form-control">
                      <option value="Laki-Laki" selected>Laki Laki</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Lainya">Lain-nya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="al">Alamat Lengkap :</label>
              <input type="text" name="al" class="form-control" id="al">
            </div>
            <div class="form-group">
              <label for="hp">No HP :</label>
              <input type="text" name="hp" class="form-control" id="hp">
            </div>
            <div class="form-group">
                <label for="foto">Upload KTP:</label>
                <input type="file" name="ktp" class="form-control" id="ktp">
            </div>
        </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@elseif($valid==0)
    <form method="post" action="{{ route('pengguna.update', auth()->user()->id) }}" enctype="multipart/form-data">
        <div class="modal-body" >
          @csrf
          @method('PATCH')
            <div class="form-group">
              <label for="nama">Nama Lengkap :</label>
              <input type="text" name="nama" class="form-control" id="nama" value="{{$pengguna->nama_lengkap}}">
            </div>
            <div class="form-group">
              <label for="nik">NIK :</label>
              <input type="text" name="nik" class="form-control" id="nik" value="{{$pengguna->nik}}">
            </div>
            <div class="form-group">
              <label for="tipe">Jenis Kelamin</label>
              <select name="jk" class="form-control" value="{{$pengguna->jenis_kelamin}}">
                      <option value="Laki-Laki" selected>Laki Laki</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Lainya">Lain-nya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="al">Alamat Lengkap :</label>
              <input type="text" name="al" class="form-control" id="al" value="{{$pengguna->alamat_lengkap}}">
            </div>
            <div class="form-group">
              <label for="hp">No HP :</label>
              <input type="text" name="hp" class="form-control" id="hp" value="{{$pengguna->no_hp}}">
            </div>
            <div class="form-group">
                <label for="foto">Upload KTP:</label>
                <input type="file" name="ktp" class="form-control" id="ktp" value="{{$pengguna->ktp}}">
            </div>
        </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@endif
@endsection