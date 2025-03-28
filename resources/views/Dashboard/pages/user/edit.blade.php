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
        <span>Edit Data User</span>
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
                                                        <h4 class="card-title">Edit Data User</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ url('/backoffice/usersetting/' . $data->id) }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" style="color: black">Nama User</label>
                                                                    <input name="name" class="form-control" type="text"
                                                                        value="{{ $data->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Email</label>
                                                                    <input name="email" class="form-control" type="email"
                                                                        value="{{ $data->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Nomor Telepon</label>
                                                                    <input name="telepon" class="form-control" type="number"
                                                                        value="{{ $data->telepon }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Deskripsi Orang</label>
                                                                    <input name="description" class="form-control" type="text"
                                                                        value="{{ $data->description }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Role</label>
                                                                    <div class="input-group">
                                                                        <select name="role_id" class="form-control">
                                                                            @foreach($card['roles'] as $role)
                                                                            <option value="{{ $role->id }}" {{ $role->id == $data->role_id ? 'selected' : '' }}>
                                                                                {{ $role->name }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Asal Provinsi</label>
                                                                    <div class="input-group">
                                                                        <select name="provinsi" id="provinsi" class="dynamic form-control" data-dependent="provinsi">
                                                                            <option value="" disabled selected>~ Pilih Provinsi ~</option>
                                                                            @foreach($asal['provinsi'] as $provinsi)
                                                                                <option value="{{ $provinsi->id }}" 
                                                                                    {{ $provinsi->id == optional($data)->provinces_id ? 'selected' : '' }}>
                                                                                    {{ $provinsi->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Asal Kota / Kabupaten</label>
                                                                    <div class="input-group">
                                                                        <label for="kota"><i class="zmdi zmdi-pin-drop"></i></label>
                                                                        <select name="kota" id="kota" class="dynamic form-control" data-dependent="kota">
                                                                            @if (optional($data->regencies)->id)
                                                                                <option value="{{ optional($data->regencies)->id }}" 
                                                                                    {{ optional($data->regencies)->id == optional($data)->provinces_id ? 'selected' : '' }}>
                                                                                    {{ optional($data->regencies)->name }}
                                                                                </option>
                                                                            @else
                                                                                <option value="" selected>-- Pilih Kota/Kabupaten --</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Asal Kecamatan</label>
                                                                    <div class="input-group">
                                                                        <label for="kecamatan"><i class="zmdi zmdi-pin"></i></label>
                                                                        <select name="kecamatan" id="kecamatan" class="dynamic form-control" data-dependent="kecamatan">
                                                                            @if (optional($data->districts)->id)
                                                                                <option value="{{ optional($data->districts)->id }}" 
                                                                                    {{ optional($data->districts)->id == optional($data)->districts_id ? 'selected' : '' }}>
                                                                                    {{ optional($data->districts)->name }}
                                                                                </option>
                                                                            @else
                                                                                <option value="" selected>-- Pilih Kecamatan --</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Asal Kelurahan</label>
                                                                    <div class="input-group">
                                                                        <label for="kelurahan"><i class="zmdi zmdi-pin-drop"></i></label>
                                                                        <select name="kelurahan" id="kelurahan" class="dynamic form-control" data-dependent="kelurahan">
                                                                            <option value="" selected>~ Pilih Kelurahan ~</option>
                                                                            @if (optional($data->villages)->id)
                                                                                <option value="{{ optional($data->villages)->id }}" 
                                                                                    {{ optional($data->villages)->id == optional($data)->villages_id ? 'selected' : '' }}>
                                                                                    {{ optional($data->villages)->name }}
                                                                                </option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Password</label>
                                                                    <div class="input-group">
                                                                        <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" placeholder="Masukkan password baru jika ingin mengganti">
                                                                        <div id="eyeicon" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Status Konfirmasi</label>
                                                                    <select name="is_approved" class="form-control">
                                                                        <option value="0" {{ $data->is_approved == 0 ? 'selected' : '' }}>Belum Konfirmasi</option>
                                                                        <option value="1" {{ $data->is_approved == 1 ? 'selected' : '' }}>Approved</option>
                                                                        <option value="2" {{ $data->is_approved == 2 ? 'selected' : '' }}>Ditolak</option>
                                                                    </select>
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
<script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");

    eyeicon.onclick = function() {
        if(password.type == "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>
<script>
    $(document).ready(function () {
        // Event change untuk menangani pemilihan provinsi
        $('#provinsi').change(function () {
            $('#loading').show();
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                var provinsiValue = $('#provinsi option:selected').val();
                
                $.ajax({
                    url: "{{ route('getkota.fetch')}}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        provinsi: provinsiValue,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function (result) {
                        $('#kota').html(result);
                    },
                    complete: function () {
                        $('#loading').hide();
                    }
                });
            }
        });

        // Event change untuk menangani pemilihan kota
        $('#kota').change(function () {
            $('#loading').show();
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                var kotaValue = $('#kota option:selected').val();
                
                $.ajax({
                    url: "{{ route('getkecamatan.fetch')}}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        kota: kotaValue,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function (result) {
                        $('#kecamatan').html(result);
                    },
                    complete: function () {
                        $('#loading').hide();
                    }
                });
            }
        });

        // Event change untuk menangani pemilihan kecamatan
        $('#kecamatan').change(function () {
            $('#loading').show();
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                var kecamatanValue = $('#kecamatan option:selected').val();
                
                $.ajax({
                    url: "{{ route('getkelurahan.fetch')}}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        kecamatan: kecamatanValue,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function (result) {
                        $('#kelurahan').html(result);
                    },
                    complete: function () {
                        $('#loading').hide();
                    }
                });
            }
        });
    });
</script>
@endsection
