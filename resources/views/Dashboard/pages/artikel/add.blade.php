@extends('Dashboard.layouts.templates')
@section('content')
<style>
    .profile-image-navbar {
        width: 40px;
        height: 40px;
        border-radius: 80%;
        margin: 0 auto;
        margin-right: 10px;
        object-fit: cover;
    }
</style>
<div class="ml-sidebar">
    <nav class="navbar navbar-custom">
        <span>Detail Data DTD</span>
        <span class="navbar-text ml-auto">
            @php
            $foto = Auth::user()->photos ? asset('storage/' . Auth::user()->photos) : null;
            @endphp
            
            @if ($foto)
                <img id="previewImage" src="{{ $foto }}" alt="Profile Picture" class="profile-image-navbar">
            @else
                <i class="fa fa-user" id="previewIcon"></i> 
                <img id="previewImage" src="" alt="Preview" class="profile-image-navbar" style="display: none;">
            @endif
            
            
            &nbsp;&nbsp;{{ $card['username'] }}
        </span>
    </nav>
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="container">
                        <main class="d-flex flex-column gap-3 grow">                       
                            <div class="body-content d-flex flex-column">
                                <main class="d-flex flex-column gap-3 grow">
                                    <section class="d-flex dlex-column gap-2 mt-4">
                                        <div class="page-inner" style="width: 100%">
                                            <div id="add-data-paket" class="card">
                                                @if(session('success'))
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Artikel Berhasil Dibuat!',
                                                        text: '{{ session('success') }}',
                                                    });
                                                </script>
                                                @endif
                                                @if ($errors->any())
                                                <script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        html: '{!! implode("<br>", $errors->all()) !!}'
                                                    });
                                                </script>
                                                @endif
                                                <div class="card-header pb-2">
                                                    <div class="d-flex align-items-center">
                                                        <h4 class="card-title">Tambah Data Artikel</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ url('/backoffice/addartikel') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Kategori Artikel</label>
                                                                    <div class="input-group">
                                                                        <select name="kategori_id" class="form-control">
                                                                            <option value="">Silhakan pilih kategori tersedia</option>
                                                                            @isset($card['kategori'])
                                                                            @foreach($card['kategori'] as $kategori)
                                                                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                                                            @endforeach
                                                                            @endisset
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Penulis</label>
                                                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                                                    <input type="hidden" name="author" value="{{ Auth::id() }}">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Judul Artikel</label>
                                                                    <input name="title" class="form-control" type="text"
                                                                        value="{{ old('title') }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Deskripsi Singkat</label>
                                                                    <input name="deskripsi_singkat" class="form-control" type="text"
                                                                        value="{{ old('deskripsi_singkat') }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Isi Konten</label>
                                                                    <textarea name="content" id="summernote" class="form-control" type="text"
                                                                        rows="10" cols="30" required>
                                                                    </textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Thumbnail Artikel</label>
                                                                    <input name="thumbnail" class="form-control" type="file">
                                                                    <p><small style="color: red">*maksimal file upload 2 mb</small></p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end mt-4">
                                                                <button type="button" class="btn btn-sm bg-warning mx-1 text-black"
                                                                    onclick="goBack()">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-sm bg-primary ml-1 text-black">
                                                                    Draft
                                                                </button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </main>
                            </div>
                        </main>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <span class="navbar-text">
            This website Powered By Kaluna Technology
        </span>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder : 'Masukkan isi konten artikel anda disini',
            tabsize : 2,
            height : 350
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
@endsection
