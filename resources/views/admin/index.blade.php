@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $stats['total_blogs'] }}</h3>
                <p>Total Blog Posts</p>
            </div>
            <div class="icon">
                <i class="fas fa-blog"></i>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="small-box-footer">Manage Blogs <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $stats['total_users'] }}</h3>
                <p>Registered Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">Manage Users <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Recent Blog Posts -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Blog Posts</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats['recent_blogs'] as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No blog posts yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .small-box .icon {
        font-size: 70px;
        color: rgba(0,0,0,0.15);
    }
</style>
@endpush
