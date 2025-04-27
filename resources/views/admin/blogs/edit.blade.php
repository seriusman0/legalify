@extends('admin.layouts.app')

@section('title', 'Sunting Blog')
@section('header', 'Sunting Blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <div id="editor" style="height: 300px;">{!! old('content', $blog->content) !!}</div>
                            <input type="hidden" name="content" id="content">
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Set the content of the editor
        quill.root.innerHTML = {!! json_encode(old('content', $blog->content)) !!};

        // Handle form submission
        document.querySelector('form').onsubmit = function() {
            // Get the HTML content from the Quill editor
            var content = quill.root.innerHTML;
            // Set the content to the hidden input
            document.querySelector('#content').value = content;
        };
    </script>
    @endpush
@endsection