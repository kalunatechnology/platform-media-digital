@extends('Dashboard.layouts.templates')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style>
    @import 'https://fonts.googleapis.com/css?family=Oswald:700';

    * {
        font-family: 'Poppins', sans-serif;
    }

    .swal2-container {
        justify-content: flex-start;
        align-items: flex-start;
        padding-top: 1rem;
        padding-left: 1rem;
    }

    .navbar-text {
        display: flex;
        align-items: center;
        margin-right: 20px;
        /* Adjust this to position the profile as needed */
    }

    /* kandidat card v1 */

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .profile-image-navbar {
        width: 40px;
        height: 40px;
        border-radius: 80%;
        margin: 0 auto;
        margin-right: 10px;
        object-fit: cover;
    }

    .content {
        flex: 1;
        padding: 1rem;
        background-image: url("{{ asset('images/bg_dashboard.png') }}");
        background-size: 600px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .card-custom {
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        background: white;
        text-decoration: none;

    }

    .upload-box {
        border-radius: 20px;
        height: 150px;
        display: flex;
        flex-direction: column; /* Mengubah arah flex menjadi vertikal */
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .upload-box img {
        width: 60px;
        margin-bottom: 10px; /* Mengurangi jarak antara gambar dan tombol */
    }

    .btn-upload {
        background-color: #0d6efd;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        text-decoration: none;
        display: inline-block;
    }

    .btn-upload:hover {
        background-color: #1869e2;
        color: #000;
        text-decoration: none;
    }

    .supported-formats {
        margin-top: 15px;
        font-size: 14px;
    }

    .supported-formats span {
        display: inline-block;
        margin: 2px 5px;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .card-text {
        font-weight: bold;
        color: black;
        text-decoration: none;
    }


    .card-icon {
        font-size: 39px;
        align-items: center;
        padding: 10px;
        padding-left: 20px;
    }

    .chart-order {
        height: 330px;
    }

    .chart-customer {
        height: 330px;
    }

    .user-image {
        width: 28px;
    }

    .table-user {
        font-size: 15px;
        justify-content: space-between;
    }

    .icon-dashboard {
        align-content: center;
        padding-left: 10px;
    }


    .footer {
        background-color: #D4D4D4;
        color: #000;
        text-align: center;
        position: relative;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.5);
        margin-top: 20px;
        border-top: 1px solid #ddd;
    }

    .footer .footer-text {
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
        color: #0B2348;
    }

    .footer img {
        height: 50px;
        margin-left: 1px;
        vertical-align: middle;
    }


    @media (max-width: 768px) {
        .footer .footer-text {
            font-size: 14px;
        }

        .navbar-text {
            flex-direction: column;
            align-items: flex-start;
        }
    }

</style>

<div class="ml-sidebar">
    <nav class="navbar navbar-custom">
        <span>Detail Data Artikel</span>
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Baris Pertama: 3 Card -->
                <div class="col-md-4 col-sm-6">
                    <a href="/backoffice/draft_articles_editor" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>{{ $card['jumlah_draft'] }}</h5>
                                <p>Draft</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa-solid card-icon fa-paste"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="/backoffice/editor_check" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>{{ $card['jumlah_editor_check'] }}</h5>
                                <p>Editor Check</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa-solid card-icon fa-spell-check"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="/backoffice/published" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>{{ $card['jumlah_published'] }}</h5>
                                <p>Published</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa fa-check card-icon text-success"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            


            <div class="row mt-4">
                <div class="card mb-4" style="width: 100%">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-hover">
                                <div class="d-flex" style="justify-content: space-between;">
                                    <h4 class="card-title text-start" style="margin-top: 4px; padding-left: 10px;">Draft
                                        Articles</h4>
                                    <a href="/backoffice/draft_articles_editor"
                                        style="margin-top: 6px; padding-right: 10px">view all</a>
                                </div>
                                <thead class="bg-grey1" style="background: #f8fafc">
                                    <tr>
                                        <th class="text-start">No.</th>
                                        <th class="text-start">Kategori</th>
                                        <th class="text-start">Judul Artikel</th>
                                    </tr>
                                </thead>
                                @php
                                $nomor=1;
                                @endphp
                                <tbody>
                                    @forelse ($card['data_draft'] as $draft)
                                    <tr>
                                        <td class="text-start">{{ $nomor++ }}</td>
                                        <td class="text-start">{{ $draft->category->name }}</td>
                                        <td class="text-start">{{ $draft->title }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Belum ada pengguna yang membuat artikel</strong></td>
                                    </tr>
                                    @endforelse                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="card mb-4" style="width: 100%">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-hover">
                                <div class="d-flex" style="justify-content: space-between;">
                                    <h4 class="card-title text-start" style="margin-top: 4px; padding-left: 10px;">
                                        Editor Check</h4>
                                    <a href="/backoffice/editor_check_editor" style="margin-top: 6px; padding-right: 10px">view
                                        all</a>
                                </div>
                                <thead class="bg-grey1" style="background: #f8fafc">
                                    <tr>
                                        <th class="text-start">No.</th>
                                        <th class="text-start">Kategori</th>
                                        <th class="text-start">Judul Artikel</th>
                                    </tr>
                                </thead>
                                @php
                                $nomor=1;
                                @endphp
                                <tbody>
                                    @forelse ($card['data_editor_check'] as $draft)
                                    <tr>
                                        <td class="text-start">{{ $nomor++ }}</td>
                                        <td class="text-start">{{ $draft->category->name }}</td>
                                        <td class="text-start">{{ $draft->title }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Anda belum melakukan pengecekan artikel</strong></td>
                                    </tr>
                                    @endforelse         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="card mb-4" style="width: 100%">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-hover">
                                <div class="d-flex" style="justify-content: space-between;">
                                    <h4 class="card-title text-start" style="margin-top: 4px; padding-left: 10px;">
                                        Published</h4>
                                    <a href="/backoffice/published_editor" style="margin-top: 6px; padding-right: 10px">view
                                        all</a>
                                </div>
                                <thead class="bg-grey1" style="background: #f8fafc">
                                    <tr>
                                        <th class="text-start">No.</th>
                                        <th class="text-start">Kategori</th>
                                        <th class="text-start">Judul Artikel</th>
                                    </tr>
                                </thead>
                                @php
                                $nomor=1;
                                @endphp
                                <tbody>
                                    @forelse ($card['data_published'] as $draft)
                                    <tr>
                                        <td class="text-start">{{ $nomor++ }}</td>
                                        <td class="text-start">{{ $draft->category->name }}</td>
                                        <td class="text-start">{{ $draft->title }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Belum ada artikel yang diterbitkan</strong></td>
                                    </tr>
                                    @endforelse         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @endsection
