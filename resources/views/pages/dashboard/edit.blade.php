@extends('layouts.dashboard')

@section('content')
    <h3 class="mb-0 text-dark fw-bold mb-5">Edit Artikel</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.update', $article->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="title"
                        required autofocus>
                </div>
                <div class="mb-3">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" value="{{ $article->id }}" id="thumbnail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="body">Isi Konten</label>
                    <textarea name="body" id="body" cols="30" rows="10">{{ $article->body }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-light">Batal & Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('assets/vendors/summernote/summernote.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendors/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#body').summernote({
                height: 400,
                tabsize: 5
            });
        });
    </script>
@endpush
