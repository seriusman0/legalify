@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container">
    <div class="jumbotron bg-white text-center">
        <h1 class="display-4">Selamat Datang di Legalify.id</h1>
        <p class="lead">Solusi bisnis dan legal yang terpercaya untuk kebutuhan Anda.</p>
        <hr class="my-4">
        <p>Kami menyediakan layanan profesional untuk membantu pengelolaan dokumen legal dan bisnis Anda.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Pelajari Layanan Kami</a>
    </div>

    <div class="row text-center">
        <div class="col-md-4">
            <h2>Lisensi Bisnis</h2>
            <p>Kami membantu Anda dalam pengurusan lisensi bisnis dengan cepat dan efisien.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Pendirian Perusahaan</h2>
            <p>Layanan lengkap untuk pendirian perusahaan Anda dari awal hingga akhir.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Properti Intelektual</h2>
            <p>Lindungi merek dan aset intelektual Anda dengan layanan kami.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
        </div>
    </div>
</div>
@endsection