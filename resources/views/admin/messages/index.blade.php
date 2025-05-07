@extends('admin.layouts.app')

@section('title', 'Kelola Pesan')


@section('content')
<div class="row">
    <div class="col-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Pesan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pesan</li>
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
                            <h3 class="card-title">Daftar Pesan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>WhatsApp</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $message)
                                        <tr class="{{ $message->status === 'unread' ? 'font-weight-bold' : '' }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($message->status === 'unread')
                                                    <span class="badge badge-primary">Belum Dibaca</span>
                                                @else
                                                    <span class="badge badge-secondary">Sudah Dibaca</span>
                                                @endif
                                            </td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->company ?? '-' }}</td>
                                            <td>{{ $message->whatsapp }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.messages.show', $message) }}" 
                                                       class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if($message->status === 'unread')
                                                        <form action="{{ route('admin.messages.mark-as-read', $message) }}" 
                                                              method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm btn-success">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.messages.mark-as-unread', $message) }}" 
                                                              method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-undo"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form action="{{ route('admin.messages.destroy', $message) }}" 
                                                          method="POST" style="display: inline;"
                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada pesan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $messages->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection

@push('css')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush
