@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Layanan')
@section('header', 'Tambah Kategori Layanan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </h3>
            </div>
                <div class="card-body">
                    <form action="{{ route('admin.service-categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama_kategori') is-invalid @enderror" 
                                   id="nama_kategori" 
                                   name="nama_kategori" 
                                   value="{{ old('nama_kategori') }}" 
                                   required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_kategori">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi_kategori') is-invalid @enderror" 
                                      id="deskripsi_kategori" 
                                      name="deskripsi_kategori" 
                                      rows="4">{{ old('deskripsi_kategori') }}</textarea>
                            @error('deskripsi_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .form-group label {
        font-weight: 600;
    }
</style>
@endpush
