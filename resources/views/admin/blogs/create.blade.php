@extends('admin.layouts.app')

@section('title', 'Buat Blog')
@section('header', 'Buat Blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul <span class="text-danger">*</span></label>
                            <input type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                id="title" 
                                name="title" 
                                value="{{ old('title') }}" 
                                required 
                                maxlength="255">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="editor">Konten <span class="text-danger">*</span></label>
                            <div id="editor">{!! old('content') !!}</div>
                            <textarea name="content" id="content" style="display: none">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori <span class="text-danger">*</span></label>
                            <input type="text" 
                                class="form-control @error('category') is-invalid @enderror" 
                                id="category" 
                                name="category" 
                                value="{{ old('category') }}" 
                                required 
                                maxlength="50">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <div class="custom-file">
                                <input type="file" 
                                    class="custom-file-input @error('image') is-invalid @enderror" 
                                    id="image" 
                                    name="image" 
                                    accept="image/jpeg,image/png,image/jpg,image/gif">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                            <small class="form-text text-muted">
                                Format yang diizinkan: jpeg, png, jpg, gif. Ukuran maksimal: 2MB
                            </small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Buat Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .ql-editor {
        min-height: 200px;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize Quill
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Set initial content if exists
        var content = $('#content').val();
        if (content) {
            quill.root.innerHTML = content;
        }

        // Custom file input
        bsCustomFileInput.init();

        // Form submission
        $('#blogForm').on('submit', function(e) {
            e.preventDefault();

            // Get the HTML content from Quill editor
            var content = quill.root.innerHTML;
            
            // Set the content to the hidden textarea
            $('#content').val(content);

            // Submit form
            this.submit();
        });

        // Image file validation
        $('#image').on('change', function() {
            const file = this.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

            if (file) {
                if (file.size > maxSize) {
                    this.value = '';
                    showError('Ukuran gambar tidak boleh melebihi 2MB');
                    return;
                }

                if (!allowedTypes.includes(file.type)) {
                    this.value = '';
                    showError('Format gambar tidak valid. Format yang diizinkan: jpeg, png, jpg, gif');
                    return;
                }
            }
        });

        function showError(message) {
            const alertHtml = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
            
            // Remove existing alerts
            $('.alert').remove();
            
            // Show new alert
            $('.card-body').prepend(alertHtml);
            
            // Scroll to top of form
            $('html, body').animate({
                scrollTop: $('.card-body').offset().top - 20
            }, 500);
        }
    });
</script>
@endpush
