@extends('components.default-layout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Selamat Datang, {{ auth()->user()->nama ?? 'User' }}!</h1>
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Anggota</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Buku Dipinjam</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Denda</h5>
                    <h2 class="mb-0">Rp 0</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection