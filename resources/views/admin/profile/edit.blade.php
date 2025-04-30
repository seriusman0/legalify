@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Settings</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group text-center mb-4">
                                    <div class="mb-3">
                                        @if($user->profile_picture)
                                            <img src="{{ asset('.storage/' . $user->profile_picture) }}" 
                                                 alt="Profile Picture" 
                                                 class="img-circle elevation-2"
                                                 style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/icons/logo1.jpeg') }}" 
                                                 alt="Default Profile" 
                                                 class="img-circle elevation-2"
                                                 style="width: 150px; height: 150px; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="custom-file" style="max-width: 300px; margin: 0 auto;">
                                        <input type="file" class="custom-file-input @error('profile_picture') is-invalid @enderror" 
                                               id="profile_picture" name="profile_picture" accept="image/*">
                                        <label class="custom-file-label" for="profile_picture">Choose profile picture</label>
                                        @error('profile_picture')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                           id="current_password" name="current_password">
                                    @error('current_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                           id="new_password" name="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" 
                                           id="new_password_confirmation" name="new_password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>

                            @push('scripts')
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Update file input label with selected filename
                                    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
                                        var fileName = e.target.files[0].name;
                                        var label = e.target.nextElementSibling;
                                        label.innerHTML = fileName;

                                        // Preview selected image
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            var preview = document.querySelector('.img-circle');
                                            preview.src = e.target.result;
                                        }
                                        reader.readAsDataURL(e.target.files[0]);
                                    });
                                });
                            </script>
                            @endpush
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
