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
        <span>User Setting</span>
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
                                <section class="d-flex gap-2 items-center">
                                    <div class="d-flex align-items-center ml-auto">
                                        <form method="GET" action="{{ url('/backoffice/usersetting') }}" class="form-search">
                                            <label for="search">
                                                <input required="" name="keyword" autocomplete="off" placeholder="cari nama pengguna"
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
                                    <div class="d-flex align-items-center ml-2">
                                        <a href="{{ url('/backoffice/adduser') }}" type="button" class="btn btn-primary rounded-lg">
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
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Email</th>
                                                            <th class="text-center">Role</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Password</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $nomor=1;
                                                    @endphp
                                                    <tbody>
                                                        @foreach ($card['get_data'] as $user)
                                                        <tr>
                                                            <td class="text-center">{{ $nomor++ }}</td>
                                                            <td class="text-center">{{ $user->name}}</td>
                                                            <td class="text-center">{{ $user->email}}</td>
                                                            <td class="text-center">{{ $user->role->name}}</td>
                                                            <td class="text-center">
                                                                @if ($user->is_approved == 0)
                                                                    <span class="badge badge-secondary">Belum Konfirmasi</span>
                                                                    <div class="d-flex justify-content-center mt-1">
                                                                        <form action="{{ url('/backoffice/approveuser/' . $user->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-sm btn-success mr-1">Approve</button>
                                                                        </form>
                                                                        <form action="{{ url('/backoffice/rejectuser/' . $user->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                                                        </form>
                                                                    </div>
                                                                @elseif ($user->is_approved == 1)
                                                                    <span class="badge badge-success">Approved</span>
                                                                @elseif ($user->is_approved == 2)
                                                                    <span class="badge badge-danger">Ditolak</span>
                                                                @endif
                                                            </td>
                                                                                                                    
                                                            <td class="text-center">{{ strlen($user->password) > 15 ? substr($user->password, 0, 15) . '...' : $user->password }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ url('/backoffice/' . $user->id . '/edituser') }}"
                                                                        class="btn btn-primary btn-sm bg-primary mr-1 text-white">Edit</a>
                                                                    <form action="{{ url('/backoffice/usersetting/' . $user->id) }}" method="POST"
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        function clearSearch(event) {
            event.preventDefault(); // Mencegah form terkirim
            document.getElementById('search').value = ''; // Kosongkan input
        }

    </script>
</div>
@endsection
