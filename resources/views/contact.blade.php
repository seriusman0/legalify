@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="contact-page-wrapper">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="contact-form-wrapper">
                    <h1 class="text-center mb-5">Hubungi Kami</h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="mb-4">
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Nama wajib diisi *"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="text" 
                               class="form-control @error('company') is-invalid @enderror" 
                               id="company" 
                               name="company" 
                               value="{{ old('company') }}" 
                               placeholder="Nama Perusahaan">
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="text" 
                               class="form-control @error('whatsapp') is-invalid @enderror" 
                               id="whatsapp" 
                               name="whatsapp" 
                               value="{{ old('whatsapp') }}" 
                               placeholder="Nomor WhatsApp *"
                               required>
                        @error('whatsapp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Email Anda"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                  id="message" 
                                  name="message" 
                                  rows="7" 
                                  placeholder="Pesan atau pertanyaan Anda *"
                                  required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-submit">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('css')
<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.contact-page-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

body > .container.py-5 {
    padding: 1rem;
}

.contact-form-wrapper {
    background: #fff;
    padding: 3.5rem;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
}

.contact-form {
    width: 100%;
}

.form-control {
    width: 100%;
    padding: 1rem 1.25rem;
    border-radius: 5px;
    border: 1px solid #e0e0e0;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
    margin-bottom: 1.25rem;
    font-size: 1rem;
    height: auto;
}

textarea.form-control {
    min-height: 180px;
    resize: vertical;
}

.mb-4 {
    margin-bottom: 1.5rem !important;
}

.contact-form .form-control:focus {
    border-color: #0d2c5b;
    box-shadow: 0 0 0 0.2rem rgba(13, 44, 91, 0.25);
    background-color: #fff;
}

.contact-form .form-control::placeholder {
    color: #6c757d;
}

.btn-primary {
    background-color: #0d2c5b;
    border-color: #0d2c5b;
    padding: 0.75rem 2.5rem;
    font-weight: 500;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0a2248;
    border-color: #0a2248;
    transform: translateY(-2px);
}

h1 {
    color: #0d2c5b;
    font-weight: 600;
    margin-bottom: 2rem;
    text-align: center;
}

.alert {
    border-radius: 5px;
}
</style>
@endpush
@endsection
