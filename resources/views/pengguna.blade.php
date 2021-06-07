@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">NIK</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i =1;
  ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>Mark</td>
      <td>1941720142</td>
      <td>
        <a href="">
          <button class="btn btn-primary">Detail</button>
        </a>
        <a href="">
          <button class="btn btn-danger">Delete</button>
        </a>
      </td>
    </tr>
  </tbody>
</table>
@endsection