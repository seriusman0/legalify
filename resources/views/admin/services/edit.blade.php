@extends('admin.layouts.app')

@section('title', 'Edit Layanan')
@section('header', 'Edit Layanan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </h3>
            </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.update', $service) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama_service">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama_service') is-invalid @enderror" 
                                   id="nama_service" 
                                   name="nama_service" 
                                   value="{{ old('nama_service', $service->nama_service) }}" 
                                   required>
                            @error('nama_service')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_kategori">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_kategori') is-invalid @enderror" 
                                    id="id_kategori" 
                                    name="id_kategori" 
                                    required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}" 
                                            {{ (old('id_kategori', $service->id_kategori) == $category->id_kategori) ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="4">{{ old('deskripsi', $service->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" 
                                       name="harga" 
                                       value="{{ old('harga', $service->harga) }}" 
                                       required>
                            </div>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bonus">Bonus</label>
                            <textarea class="form-control @error('bonus') is-invalid @enderror" 
                                      id="bonus" 
                                      name="bonus" 
                                      rows="3">{{ old('bonus', $service->bonus) }}</textarea>
                            @error('bonus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="text" 
                                   class="form-control @error('durasi') is-invalid @enderror" 
                                   id="durasi" 
                                   name="durasi" 
                                   value="{{ old('durasi', $service->durasi) }}"
                                   placeholder="Contoh: 7 hari kerja">
                            @error('durasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control @error('status') is-invalid @enderror" 
                                    id="status" 
                                    name="status" 
                                    required>
                                <option value="aktif" {{ old('status', $service->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak aktif" {{ old('status', $service->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
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
