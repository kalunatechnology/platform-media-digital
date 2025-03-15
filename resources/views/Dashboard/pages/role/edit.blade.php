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
        <span>Edit Data Role</span>
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
                                                        <h4 class="card-title">Edit Option Jenis Isu</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ url('/backoffice/role/' . $data->id) }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" style="color: black">Option Role Pengguna</label>
                                                                    <input name="name" class="form-control" type="text"
                                                                        value="{{ $data->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end mt-4">
                                                                <button type="button" class="btn btn-sm bg-warning mx-1 text-black"
                                                                    onclick="goBack()">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-sm bg-primary ml-1 text-black">
                                                                    Save Data
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
@endsection
