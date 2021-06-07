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
  @foreach($user as $user)
  @if($user->user->level == "user")
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$user->user->name}}</td>
      <td>{{$user->nik}}</td>
      <td>
        <a href="{{route('pengguna.show',$user->user_id)}}">
              <button class="btn btn-primary">Detail</button>
        </a>
      </td>
    </tr>
    <?php
      $i++;
    ?>
  @endif
  @endforeach
  </tbody>
</table>
@endsection