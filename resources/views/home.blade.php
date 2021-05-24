@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h3>Selamat Datang <strong>{{ Auth::user()->name }}</strong></h3>
    <hr>
    <div class="pt-4">
        <h5 class=""><strong><span class="text-danger">*</span> PENGUMUMAN:</strong></h5>
        <h5 >Jika Anda Pengguna Baru Silahkan Mengikuti Langkah Sesuai Prosedur Dibawah :</h5>
        <div class="p-3 border border-1 border-dark">
            <p>1. Melakukan Pengisian Data Pribadi Pada Menu <b>Data Pribadi <i class="fas fa-arrow-right"></i> Edit Kelengkapan Diri</b></p>
            <p>2. Melakukan Upload KTP Penyewa Pada Menu <b>Data Pribadi <i class="fas fa-arrow-right"></i> Upload KTP</b></p>
            <p>3. Melakukan Pemesanan Mobil Pada Menu <b>Kendaraan</b> <i class="fas fa-arrow-right"></i> <b>Pilih Jenis Kendaraan</b></p>
            <p>4. Melihat Status Mobil Yang Dipesan Pada Menu <b>Kendaraan Yang DiSewa</b></p>
        </div>
        <h5 class="pt-4"><strong> INFROMASI TOKO :</strong></h5>
        <div class="border border-1 border-dark rounded mt-2 p-3">
            <h5 class="pt-2"><strong>Jam Buka  &nbsp&nbsp: 09.00</strong></h5>
            <h5 class="pb-3"><strong>Jam Tutup &nbsp: 18.00</strong></h5>
            <h5 class="pt-2"><strong>Contact Person: </strong></h5>
            <h6>085745785615 ( Reynaldi )</h6>
            <h6>085745785615 ( Dimasqi )</h6>
                
            <h5 class="pt-4"><strong>Alamat Toko : </strong></h5>
            <h6>Jl.Soekarno Hatta No.16 Kecamatan Lowokwaru , Malang ( Sebelah Barat Politeknik Negeri Malang )</h6>
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4435.38921164276!2d112.61392993417793!3d-7.948977954692636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x56a5edb7ccb2769b!2sGraha%20Polinema!5e0!3m2!1sid!2sid!4v1621862043559!5m2!1sid!2sid"  width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    
</div>

@endsection
