@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="row">
    <div class="col-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pesan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Pesan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pesan</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-arrow-left mr-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 200px">Status</th>
                                            <td>
                                                @if($message->status === 'unread')
                                                    <span class="badge badge-primary">Belum Dibaca</span>
                                                @else
                                                    <span class="badge badge-secondary">Sudah Dibaca</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pengirim</th>
                                            <td>{{ $message->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Dikirim</th>
                                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Perusahaan</th>
                                            <td>{{ $message->company ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>WhatsApp</th>
                                            <td>
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->whatsapp) }}" target="_blank">
                                                    {{ $message->whatsapp }}
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Isi Pesan</h3>
                                        </div>
                                        <div class="card-body">
                                            {{ $message->message }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="btn-group">
                                        @if($message->status === 'unread')
                                            <form action="{{ route('admin.messages.mark-as-read', $message) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success mr-2">
                                                    <i class="fas fa-check mr-1"></i>Tandai Sudah Dibaca
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.messages.mark-as-unread', $message) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning mr-2">
                                                    <i class="fas fa-undo mr-1"></i>Tandai Belum Dibaca
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.messages.destroy', $message) }}" 
                                              method="POST" style="display: inline;"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash mr-1"></i>Hapus Pesan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection
