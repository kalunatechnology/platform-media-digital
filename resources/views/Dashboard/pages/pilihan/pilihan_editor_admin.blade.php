@extends('Dashboard.layouts.templates')
@section('content')
<style>
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

    .thumbnail {
        max-width: 60px;
        max-height: 60px;
    }
    .modal-body img {
        max-width: 454px;
    }

</style>
<div class="ml-sidebar">
    <nav class="navbar navbar-custom">
        <span class="title-page">Pilihan Editor</span>
        <span class="navbar-text ml-auto">
            <i class="fa fa-user"></i>
            &nbsp;&nbsp;{{ $card['username'] }}
        </span>
    </nav>
    <div class="content">
        <div class="wrapper">
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <div class="container">
                            <main class="d-flex flex-column gap-3 grow">
                                <section class="d-flex gap-2 items-center justify-content-between">
                                    <div style="color: red">1. Hubungi editor jika ingin memberi saran artikel yang di pilih. <br> 2. Anda hanya bisa melihat artikel yang sudah dipilih dan belum dipilih oleh editor</div>
                                </section>
                                <div class="d-flex align-items-center ml-auto">
                                    <form method="GET" action="{{ url('/backoffice/pilihan_editor_admin') }}" class="form-search">
                                        <label for="search">
                                            <input required="" name="keyword" autocomplete="off" placeholder="cari judul atau penulis artikel"
                                                id="search" type="text" value="{{ $card['keyword'] }}">
                                            <div class="icon">
                                                <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="swap-on">
                                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                                        stroke-linejoin="round" stroke-linecap="round"></path>
                                                </svg>
                                                <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="swap-off">
                                                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round"
                                                        stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                            <!-- Tombol untuk menghapus input -->
                                            <button type="button" class="close-btn" onclick="clearSearch(event)">
                                                <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <!-- Tombol untuk mengirim pencarian -->
                                            <a type="submit" class="search-btn"></a>
                                        </label>
                                    </form>
                                    
                                </div>
                                <section class="mt-4">
                                    <div class="card mb-4">
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive">
                                                <table class="table align-items-center mb-0 table-hover">
                                                    <thead class="bg-grey1">
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">Pilihan Editor</th>
                                                            <th class="text-center">Thumbnail</th>
                                                            <th class="text-center">Kategori</th>
                                                            <th class="text-center">Penulis</th>
                                                            <th class="text-center">Judul Artikel</th>
                                                            <th class="text-center">Deskripsi Singkat</th>
                                                            <th class="text-center">Konten</th>
                                                        </tr>
                                                    </thead>
                                                    @php $nomor = 1; @endphp
                                                    <tbody>
                                                        @forelse ($card['get_data'] as $artikel)
                                                        <tr>
                                                            <td class="text-center">{{ $nomor++ }}</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" 
                                                                       {{ $artikel->editor_pick ? 'checked' : '' }} 
                                                                       disabled>
                                                            </td>
                                                            <td>
                                                                <img src="{{ asset('storage/' . $artikel->thumbnail) }}" 
                                                                     alt="Dokumentasi" 
                                                                     class="thumbnail">
                                                            </td>
                                                            <td class="text-center">{{ $artikel->category->name }}</td>
                                                            <td class="text-center">{{ $artikel->user->name }}</td>
                                                            <td class="text-center">{{ $artikel->title }}</td>
                                                            <td class="text-center">{{ $artikel->short_description }}</td>
                                                            <td class="text-center">
                                                                {!! Str::limit(strip_tags($artikel->content), 100, '...') !!}
                                                                <a href="#" data-toggle="modal" data-target="#contentModal_{{ $artikel->id }}">Selengkapnya</a>
                                                            </td>
                                                        </tr>
                                
                                                        <!-- Modal untuk Konten Lengkap -->
                                                        <div class="modal fade" id="contentModal_{{ $artikel->id }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel_{{ $artikel->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel_{{ $artikel->id }}">Konten Lengkap</h5>
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
                                                            <td colspan="8" class="text-center">Belum ada artikel yang memenuhi kriteria.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="px-
                                
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    {{-- <footer class="footer">
        <span class="footer-text">
            This website Powered By Kaluna Technology
            <img src="{{ URL::asset('images/footer_logo.png') }}" alt="Kaluna Technology Logo">
    </span>
    </footer> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</div>
@endsection
