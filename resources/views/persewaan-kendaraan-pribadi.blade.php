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
    <tr>
        <th scope="row">1</th>
        <td><a href="#">Honda Ayla</a></td>
        <td><a href="#">Dimasqi</a></td>
        <td>5</td>
        <td>
            <div class="box">
                <select name="status" >
                    <option value="batal">Batal</option>
                    <option value="pending">Pending</option>
                    <option value="setuju">Setuju</option>
                </select>
                <a href="#" class="btn btn-outline-primary" type="submit">
                    <i class="fas fa-save"></i>
                </a>
            </div>
        </td>
    </tr>
  </tbody>
</table>
@endsection
