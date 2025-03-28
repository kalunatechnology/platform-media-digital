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
        <span>Edit Data Artikel</span>
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
                                                        title: 'Data Berhasil Ditambahkan !',
                                                        text: '{{ session('
                                                        success ') }}',
                                                    });

                                                </script>
                                                @endif
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                <div class="card-header pb-2">
                                                    <div class="d-flex align-items-center">
                                                        <h4 class="card-title">Edit Data Draft Artikel</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ url('/backoffice/editor/' . $data->id) }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Kategori Artikel</label>
                                                                    <div class="input-group">
                                                                        <select name="kategori_id" class="form-control">
                                                                            @foreach($card['kategori'] as $kategori)
                                                                                <option value="{{ $kategori->id }}" {{ $kategori->id == $data->kategori_id ? 'selected' : '' }}>
                                                                                    {{ $kategori->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Penulis</label>
                                                                    <input type="text" class="form-control" value="{{ $data->user->name}}" readonly>
                                                                    <input type="hidden" name="author" value="{{ $data->user_id }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Title</label>
                                                                    <input name="title" class="form-control" type="text"
                                                                        value="{{ $data['title'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Deskripsi Singkat</label>
                                                                    <input name="deskripsi_singkat" class="form-control" type="text"
                                                                        value="{{ $data['short_description'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Isi Konten</label>
                                                                    <textarea name="content" id="summernote" class="form-control" type="text"
                                                                        rows="10" cols="30">{!! $data['content'] !!}
                                                                    </textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Lama Waktu Membaca <small style="color: red"><strong>(tulis angka saja mis:4 satuan dalam menit)</strong></small></label>
                                                                    <input name="time" class="form-control" type="text"
                                                                        value="{{ $data['time'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Thumbnail Artikel</label>
                                                                    <input name="thumbnail" class="form-control" type="file">
                                                                    <img class="mt-3" style="max-height: 100px"
                                                                    src="{{ asset('storage/' . $data->thumbnail) }}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" style="color: red">
                                                                *setelah anda menekan "simpan perubahan" maka artikel akan diganti status menjadi "editor check" dan tunggu admin untuk menyetujui kapan artikel akan publish
                                                            </div>
                                                            <div class="d-flex justify-content-end mt-4">
                                                                <a href="{{ url('/backoffice/draft_articles_editor') }}" class="btn btn-sm bg-warning mx-1 text-black">
                                                                    Cancel
                                                                </a>
                                                                <button type="submit" class="btn btn-sm bg-primary ml-1 text-black">
                                                                    Simpan Perubahan
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
