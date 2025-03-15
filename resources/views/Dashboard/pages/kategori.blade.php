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
    <div class="content">
        <div class="wrapper">
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <div class="container">
                            <main class="d-flex flex-column gap-3 grow">
                                <section class="d-flex gap-2 items-center justify-content-between">
                                    <div class="d-flex align-items-center ml-auto">
                                        <a href="{{ url('/backoffice/addkategori') }}" type="button" class="btn btn-primary rounded-lg">
                                            <div class="fa fa-fw fa-plus mr-2"></div> Add Data
                                        </a>
                                    </div>
                                </section>
                                <section class="mt-4">
                                    <div class="card mb-4">
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive">
                                                <table class="table align-items-center mb-0 table-hover">
                                                    <thead class="bg-grey1">
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">Jenis Artikel</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $nomor=1;
                                                    @endphp
                                                    <tbody>
                                                        @foreach ($card['get_data'] as $kategori)
                                                        <tr>
                                                            <td class="text-center">{{ $nomor++ }}</td>
                                                            <td class="text-center">{{ $kategori->name}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ url('/backoffice/' . $kategori->id . '/editkategori') }}"
                                                                        class="btn btn-primary btn-sm bg-primary mr-1 text-white">Edit</a>
                                                                    <form action="{{ url('/backoffice/kategori/' . $kategori->id) }}" method="POST"
                                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="submit" name="submit"
                                                                            value="delete"
                                                                            class="btn btn-sm btn-danger bg-danger ml-1 text-white">
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="px-4 mt-4">
                                                {{ $card['get_data']->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
