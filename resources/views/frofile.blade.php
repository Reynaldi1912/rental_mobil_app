@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5 pb-5">
    <div class="card-body border border-3 border-dark rounded">
        <div class="content text-center">
        @if(auth()->user()->foto==NULL)
            <img class="rounded" src="/img/boy.png" width="100px" class="pb-4" alt="">
        @endif
        @if(auth()->user()->foto!=NULL)
            <img class="rounded" src="{{asset('storage/'.auth()->user()->foto)}}" width="100px" class="pb-4" alt="">
        @endif
        </div>
        <div class="row justify-content-center pt-4">
            <form method="post" action="{{ route('update_frofil') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="name">Nama User : </label>
                    <input type="name" name="name" class="form-control" id="name" value="{{auth()->user()->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email : </label>
                    <input type="email" name="email" class="form-control" id="email" value="{{auth()->user()->email}}">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Frofil : </label>
                    <input type="file" name="foto" class="form-control" id="foto" min="1" max="100" value="">
                </div>
                <div class="row justify-content-center pt-4">
                    <button type="submit" class="btn btn-primary"> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
