@extends('layouts.app')

@section('content')
<div class="container text-center"><h2><strong>DATA DIRI ANDA</strong></h2></div>
@if($valid == 0)
    <h4>Nama Lengkap : </h4>
    <h5>{{$pengguna->nama_lengkap}}</h5>
    <h4>NIK : </h4>
    <h5>{{$pengguna->nik}}</h5>
    <h4>Jenis Kelamin : </h4>
    <h5>{{$pengguna->jenis_kelamin}}</h5>
    <h4>Alamat Lengkap : </h4>
    <h5>{{$pengguna->alamat_lengkap}}</h5>
    <h4>No Handphone(Aktif) : </h4>
    <h5>{{$pengguna->no_hp}}</h5>
    <h4>Foto KTP : </h4>
    @if($pengguna->ktp==NULL)
        <img class="rounded" src="/img/boy.png" width="100px" class="pb-4" alt="">
    @endif
    @if($pengguna->ktp!=NULL)
        <img class="rounded" src="{{asset('storage/'.$pengguna->ktp)}}" width="400px" class="pb-4" alt="">
    @endif
@else
    <a href="{{route('pengguna.edit',auth()->user()->id)}}">
        <button class="btn btn-outline-primary" type="submit">
            Lengkapi Data Anda Sekarang
        </button>
    </a>
@endif
@endsection