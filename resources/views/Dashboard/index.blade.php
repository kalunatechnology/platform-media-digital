@extends('Dashboard.layouts.templates')
@section('content')

<style>
    @import 'https://fonts.googleapis.com/css?family=Oswald:700';

    * {
        font-family: 'Poppins', sans-serif;
    }


    .navbar-text {
        display: flex;
        align-items: center;
        margin-right: 20px;
        font-size: 17px;
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .thumbnail {
        max-width: 60px;
        max-height: 60px;
    }

    .content {
        padding: 20px;
        background-color: #f9f9f9;
        height: 1000px;
    }

    .stats-container {
        padding: 20px;
        background-color: #f7f7f7;
    }

    /* Row */
    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        gap: 20px;
    }

    /* Stat Card */
    .stat-card {
        flex: 1;
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 15px 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    /* Title */
    .stat-card h4 {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    /* Value */
    .stat-value {
        font-size: 24px;
        font-weight: 700;
        color: #333;
    }

    .card {
        background-color: #fff;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* Menambahkan smoothing saat scrolling di perangkat seluler */
    }

    .details-table {
        width: 100%;
        border-collapse: collapse;
        /* Pastikan tabel tetap dalam satu baris */
    }

    .details-table th,
    .details-table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
        /* Atur agar teks di setiap kolom berada di tengah */
    }

    .details-table th {
        background-color: #f5f5f5;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    .details-table td {
        font-size: 14px;
    }

    .details-table a {
        text-decoration: none;
        color: #007bff;
        display: inline-block;
        transition: color 0.2s;
    }

    .details-table a:hover {
        color: #0056b3;
    }

</style>

<div class="ml-sidebar">
    <nav class="navbar navbar-custom">
        <span>Home</span>
        <span class="navbar-text ml-auto">
            <i class="fa fa-user"></i>
            &nbsp;&nbsp;{{ $card['username'] }}
        </span>
    </nav>

    <div class="content">
        <div class="stats-container">
            <!-- Row 1 -->
            <div class="row">
                <div class="stat-card">
                    <h4>Artikel Dibuat</h4>
                    <p class="stat-value">{{ $card['jumlahartikel'] }}</p>
                </div>
                <div class="stat-card">
                    <h4>Pesan Masuk</h4>
                    <p class="stat-value">{{ $card['jumlahpesan'] }}</p>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="table-container">
                <h4>
                    <i class="fa-solid fa-address-book"></i>
                    <b>Pesan Masuk Terbaru</b>
                </h4>
                <table class="details-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Layanan Yang Diinginkan</th>
                            <th>Detail Project</th>
                            <th>Nominal Project</th>
                            <th>PIC</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                    $nomor=1;
                    @endphp
                    <tbody>
                        @foreach ($card['datapesan'] as $pesan)
                        <tr>
                            <td class="large-text">{{ $nomor++ }}</td>
                            <td class="text-center">{{ $pesan->name}}</td>
                            <td class="text-center">{{ $pesan->email}}</td>
                            <td class="text-center">{{ $pesan->jenislayanan->name }}, [
                                {{ $pesan->jenislayanan->jenis_layanan }}]</td>
                            <td class="text-center">{{ $pesan->detail_project}}</td>
                            <td class="text-center">{{ $pesan->nominal ?? '-' }}</td>
                            <td class="text-center">{{ $pesan->pic ?? '-' }}</td>
                            <td><a href="{{ route('kontak') }}">Selengkapnya</a></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive mt-5">
            <div class="table-container">
                <h4>
                    <i class="fa-solid fa-address-book"></i>
                    <b>Artikel Terbaru Terbaru</b>
                </h4>
                <table class="details-table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Thumbnail</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Penulis</th>
                            <th class="text-center">Judul Artikel</th>
                            <th class="text-center">Deskripsi Singkat</th>
                            <th class="text-center">konten</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                    $nomor=1;
                    @endphp
                    <tbody>
                        @forelse ($card['dataartikel'] as $artikel)
                        <tr>
                            <td class="text-center">{{ $nomor++ }}</td>
                            <td><img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="Dokumentasi"
                                    class="thumbnail"></td>
                            <td class="text-center">{{ $artikel->kategori->name }}</td>
                            <td class="text-center">{{ $artikel->author }}</td>
                            <td class="text-center">{{ $artikel->title }}</td>
                            <td class="text-center">{{ $artikel->deskripsi_singkat }}</td>
                            <td class="text-center">
                                {!! Str::limit(strip_tags($artikel->content), 100, '...') !!}
                                <a href="#" data-toggle="modal"
                                    data-target="#contentModal_{{ $artikel->id }}">Selengkapnya</a>
                            </td>
                            <td><a href="{{ route('artikel') }}">Selengkapnya</a></td>
                            </td>
                        </tr>
                        <!-- Modal hanya muncul jika data tersedia -->
                        <div class="modal fade" id="contentModal_{{ $artikel->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel_{{ $artikel->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel_{{ $artikel->id }}">Konten Lengkap
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $artikel->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <footer class="footer">
            <span class="footer-text">
                This Website Powered By Perusahaan
                <img src="{{ URL::asset('images/IMG_5711.png') }}" alt="Logo Perusahaan">
        </span>
        </footer> --}}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-bundle.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
