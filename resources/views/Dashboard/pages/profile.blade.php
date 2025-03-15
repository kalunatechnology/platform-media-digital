@extends('Dashboard.layouts.templates')
@section('content')
<style>

    .form-container {
        padding-right: 20px;
    }

    .profile-box {
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        position: relative;
        max-width: 280px;
        margin-bottom: 20px;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto;
        object-fit: cover;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
        background-color: #fff;
        color: #333;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .change-image {
        font-size: 12px;
        color: #333;
        cursor: pointer;
        margin-top: 10px;
    }

    .save-button {
        background-color: #E1B587;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .save-button:hover {
        background-color: #FBF7EB;
    }

    .upload-button {
        background-color: #E1B587;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .upload-button:hover {
        background-color: #FBF7EB;
    }
</style>
<div class="ml-sidebar">
    <nav class="navbar navbar-custom">
        <span class="title-page">Update Profile</span>
    </nav>
    <div class="content">
        <div class="container mt-1">
            <form method="POST" action="{{ route('profile', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="content-box row" style="margin-bottom: 70px;">
                    <div class="col-md-9 form-container">
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" value="{{ $data->name }}" id="name" name="name" placeholder="nama pengguna">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $data->email }}" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" value="{{ $data->telepon }}" id="telepon" name="telepon" placeholder="Nomor Telepon">
                        </div>
                        <div class="mb-3">
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
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-control-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" placeholder="Masukkan password baru jika ingin mengganti">
                                <div id="eyeicon" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $data->role_id }}" id="role_id" name="role_id" >
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $data->is_approved }}" id="is_approved" name="is_approved" >
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="save-button">Update Profile</button>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center align-items-start">
                        <div class="profile-box">
                            @php
                            $foto = Auth::user()->photos ? asset('storage/' . Auth::user()->photos) : null;
                            @endphp
                            
                            @if ($foto)
                                <img id="previewImage" src="{{ $foto }}" alt="Profile Picture" class="profile-image">
                            @else
                                <i class="fa fa-user fa-5x" id="previewIcon"></i> <!-- Ikon FA untuk default -->
                                <img id="previewImage" src="" alt="Preview" class="profile-image" style="display: none;">
                            @endif
                            
                    
                            <div class="change-image">
                                <label for="uploadImage" class="upload-button">Pilih Gambar</label>
                                <input type="file" name="photos" id="uploadImage" style="display: none" accept="image/*">
                                <br><small>*maksimal size 2MB</small>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        function clearSearch(event) {
            event.preventDefault(); // Mencegah form terkirim
            document.getElementById('search').value = ''; // Kosongkan input
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
    <script>
        document.getElementById('uploadImage').addEventListener('change', function(event) {
            let file = event.target.files[0]; 
            let previewImage = document.getElementById('previewImage');
            let previewIcon = document.getElementById('previewIcon'); // Ambil ikon

            if (file) {
                if (file.size > 2 * 1024 * 1024) { // Cek batas ukuran 2MB
                    alert('Ukuran file maksimal 2MB!');
                    event.target.value = ""; 
                    return;
                }

                let reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block"; // Pastikan gambar muncul

                    if (previewIcon) {
                        previewIcon.style.display = "none"; // Sembunyikan ikon
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
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

    
</div>
@endsection
