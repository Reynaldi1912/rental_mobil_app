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
          @if(auth()->user()->level=="admin")
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Data</button>
          @endif


      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
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
      <?php
        $i=1;
      ?>
      @foreach($kendaraan as $kendaraan)
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$kendaraan->nama}}</td>
        <td>{{$kendaraan->harga}} /Hari</td>
        <td>{{$kendaraan->stok}}</td>
        <td>
          @if(auth()->user()->level=="user")
          <a class="btn btn-info" href="{{ route('mobil-umum.show',$kendaraan->id) }}">Detail</a>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sewa_sekarang" data-catid="{{$kendaraan->id}}">Sewa Sekarang</button>
          @endif

          @if(auth()->user()->level=="admin")
              <a class="btn btn-info" href="{{ route('mobil-umum.show',$kendaraan->id) }}">Detail</a>
              <a class="btn btn-warning" href="{{ route('mobil-umum.edit',$kendaraan->id) }}" data-bs-toggle="modal" data-bs-target="#editModal" data-catid="{{$kendaraan->id}}" data-namke="{{$kendaraan->nama}}" data-harke="{{$kendaraan->harga}}" data-stokke="{{$kendaraan->stok}}" data-kurke="{{$kendaraan->jumlah_kursi}}">Edit</a>
              <a href="javascript:void(0);" data-toggle="modal" data-target="#hapusPribadiModal" data-catid="{{$kendaraan->id}}">
                <button type="submit" class="btn btn-danger">Delete</button>
              </a>
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
</div>

@endsection


  <!-- modal hapus data -->
            <div class="modal fade" id="hapusPribadiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="post" action="{{ route('mobil-umum.destroy',$kendaraan->id) }}">
                @csrf
                @method('DELETE')
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Yakin Mobil Ini Dihapus?</p>
                    <input type="hidden" name="id" id="cat_id" value="" >
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end modal hapus data -->


<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kendaraan</h5>
        <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i></button>
      </div>
      <form method="post" action="{{ route('mobil-umum.store') }}" enctype="multipart/form-data">
        <div class="modal-body" >
          @csrf
            <div class="form-group">
              <label for="nama">Nama Mobil :</label>
              <input type="nama" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="harga">Harga :</label>
              <input type="harga" name="harga" class="form-control" id="harga">
            </div>
            <div class="form-group">
              <label for="stok">Stok :</label>
              <input type="number" name="stok" class="form-control" id="stok" min="1" max="100">
            </div>
            <div class="form-group">
              <label for="kursi">Jumlah Kursi :</label>
              <input type="number" name="kursi" class="form-control" id="kursi" min="1" max="100">
            </div>
            <div class="form-group">
              <label for="tipe">Tipe Mobil</label>
              <select name="tipe" class="form-control">
                      <option value="Mini Bus">Mini Bus</option>
                      <option value="Bus">Bus</option>
                      <option value="Mobil Box">Mobil Box</option>
              </select>
            </div>
            <div class="form-group">
              <label for="transmisi">Transmisi</label>
              <select name="transmisi" class="form-control">
                      <option value="Manual">Manual</option>
                      <option value="Otomatis">Otomatis</option>
              </select>
            </div>
            <div class="form-group">
                <label for="foto">Upload Foto:</label>
                <input type="file" name="foto" class="form-control" id="foto" min="1" max="100" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal tambah data -->


 <!-- Modal edit Data -->
              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data Kendaraan</h5>
                      <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i></button>
                    </div>
                    <form method="post" action="{{ route('mobil-umum.update',$kendaraan->id) }}" enctype="multipart/form-data">
                      <div class="modal-body">
                      <input type="hidden" name="id" id="ken_id" value="" >
                        @csrf
                        @method('PATCH')

                          <div class="form-group">
                            <label for="nama">Nama Mobil :</label>
                            <input type="nama" name="nama" class="form-control" id="nama">
                          </div>
                          <div class="form-group">
                            <label for="harga">Harga :</label>
                            <input type="harga" name="harga" class="form-control" id="harga" value="">
                          </div>
                          <div class="form-group">
                            <label for="stok">Stok :</label>
                            <input type="number" name="stok" class="form-control" id="stok" min="1" max="100" value="">
                          </div>
                          <div class="form-group">
                            <label for="kursi">Jumlah Kursi :</label>
                            <input type="number" name="kursi" class="form-control" id="kursi" min="1" max="100" value="">
                          </div>
                          <div class="form-group">
                            <label for="tipe">Tipe Mobil</label>
                            <select name="tipe" class="form-control">
                                    <option value="Mini Bus">Mini Bus</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Mobil Box">Mobil Box</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <select name="transmisi" class="form-control">
                                    <option value="Manual">Manual</option>
                                    <option value="Otomatis">Otomatis</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="foto">Upload Foto:</label>
                            <input type="file" name="foto" class="form-control" id="foto" min="1" max="100" value="">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
              <!-- end modal tambah data -->


                    <!-- Modal sewa-->
<div class="modal fade" id="sewa_sekarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post" action="{{ route('cek-sewa.store_umum') }}">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="cat_id" value="" >
        <div class="form-group">
          <label for="stok">Kapan Tanggal Pemakaian ?</label>
          <input type="date" name="tanggal_pakai" class="form-control" id="tanggal_pakai" value="">
          </div>
          <div class="form-group">
            <label for="kursi">Sewa Berapa Hari ?</label>
            <input type="number" name="sewa_hari" class="form-control" id="sewa_hari" value="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
      </div>
      </form>
    </div>
  </div>
</div>

