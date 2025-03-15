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
    }
    .profile-image-navbar {
        width: 40px;
        height: 40px;
        border-radius: 80%;
        margin: 0 auto;
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

    .card {
        background-color: white;
        border: none;
        border-radius: 8px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .total-timses-card {
        background-color: #C30010;
        color: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .total-timses-card h3 {
        margin: 0;
        font-size: 1.5rem;
    }

    .total-timses-card .display-4 {
        font-size: 3rem;
        font-weight: bold;
    }

    .search-bar {
        display: flex;
        margin-bottom: 20px;
        max-width: 400px;
        width: 100%;
    }

    .search-bar input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .search-button {
        background-color: #C30010;
        border: none;
        border-radius: 0 5px 5px 0;
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #a0000c;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .thumbnail {
        max-width: 60px;
        max-height: 60px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    /* Styling for modal content */
    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-body img {
        width: 100%;
        height: auto;
        max-width: 300px;
        cursor: pointer;
    }

    .modal-body img:hover {
        transform: scale(1.1);
    }

    .modal-body .row {
        margin-top: 10px;
    }

    .modal-body .row .col {
        margin-bottom: 10px;
    }

    .detail-button {
        padding: 6px 12px;
        background-color: #C30010;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .detail-button:hover {
        background-color: #a0000c;
        color: white;
    }


    /* Tombol btn-close default dari Bootstrap 5 */
    .btn-close {
        position: relative;
        width: 30px;
        /* Ukuran tombol */
        height: 30px;
        background-color: transparent;
        /* Hilangkan background */
        border: none;
        cursor: pointer;
    }

    /* Gaya tombol close berbentuk silang */
    .btn-close::before,
    .btn-close::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        /* Panjang garis silang */
        height: 2px;
        /* Lebar garis */
        background-color: black;
        /* Warna garis */
    }

    .btn-close::before {
        transform: translate(-50%, -50%) rotate(45deg);
        /* Membuat garis miring pertama */
    }

    .btn-close::after {
        transform: translate(-50%, -50%) rotate(-45deg);
        /* Membuat garis miring kedua */
    }

    /* Menambah hover effect jika diinginkan */
    .btn-close:hover::before,
    .btn-close:hover::after {
        background-color: red;
        /* Warna silang berubah saat di-hover */
    }

    /* Modal Styles */
    .modal-header {
        background-color: #f4f4f4;
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;
    }

    /* Floating window (modal) content */
    .modal-content {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        padding: 20px;
    }

    .modal-body {
        padding: 20px;
        font-family: 'Poppins', sans-serif;
    }

    /* Foto in Modal */
    .modal-body img {
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .modal-body img:hover {
        transform: scale(1.05);
        /* Zoom effect */
    }

    /* Font styling for labels and data */
    .modal-body .row {
        margin-bottom: 15px;
    }

    .modal-body .row .col {
        font-weight: bold;
        font-size: 18px;
        color: #333;
    }

    .modal-body .row .col::after {
        content: ":";
        margin-right: 5px;
    }

    .modal-body .data {
        font-weight: normal;
        font-size: 18px;
        color: #666;
    }

    /* Spacing for sections */
    .modal-body .col,
    .modal-body .data {
        margin-bottom: 10px;
    }

    /* Download button styling */
    .download-btn {
        display: inline-block;
        background-color: #C30010;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .download-btn:hover {
        background-color: #a0000c;
    }

    .custom-questions {
        background-color: #f8f9fa;
        /* Light gray background */
        border: 1px solid #dee2e6;
        /* Border color */
        border-radius: 8px;
        /* Rounded corners */
        padding: 15px;
        /* Padding around the content */
        margin-top: 20px;
        /* Top margin */
    }

    .custom-questions h5 {
        font-size: 18px;
        /* Font size for the heading */
        font-weight: bold;
        /* Bold text */
        color: #343a40;
        /* Dark color for the heading */
        margin-bottom: 10px;
        /* Space below the heading */
    }

    .custom-questions ul {
        list-style-type: none;
        /* Remove default list styles */
        padding: 0;
        /* Remove default padding */
    }

    .custom-questions li {
        font-size: 16px;
        /* Font size for list items */
        color: #495057;
        /* Darker gray for text */
        padding: 5px 0;
        /* Space between list items */
        border-bottom: 1px solid #dee2e6;
        /* Bottom border for list items */
    }

    .custom-questions li:last-child {
        border-bottom: none;
        /* Remove border for the last item */
    }


    /* Fullscreen image preview */
    .fullscreen-img-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 1050;
    }

    .fullscreen-img-modal img {
        max-width: 90%;
        max-height: 90%;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .fullscreen-img-modal img:hover {
        transform: scale(1.05);
    }

    /* Close button for fullscreen preview */
    .fullscreen-img-modal .close-preview {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 40px;
        color: white;
        cursor: pointer;
    }

    .download-button {
        position: relative;
        border-width: 0;
        color: white;
        font-size: 15px;
        font-weight: 600;
        border-radius: 4px;
        z-index: 1;
    }

    .download-button .docs {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        min-height: 40px;
        padding: 0 10px;
        border-radius: 4px;
        z-index: 1;
        background-color: #242a35;
        border: solid 1px #e8e8e82d;
        transition: all .5s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .download-button:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .download {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 90%;
        margin: 0 auto;
        z-index: -1;
        border-radius: 4px;
        transform: translateY(0%);
        background-color: #01e056;
        border: solid 1px #635f7a2d;
        transition: all .5s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .download-button:hover .download {
        transform: translateY(100%)
    }

    .download svg polyline,
    .download svg line {
        animation: docs 1s infinite;
    }

    @keyframes docs {
        0% {
            transform: translateY(0%);
        }

        50% {
            transform: translateY(-15%);
        }

        100% {
            transform: translateY(0%);
        }
    }

    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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
        <!-- Card Jumlah Timses -->
        <div class="card total-timses-card">
            <div class="card-body">
                <h3>Data Draft Artikel {{ $card['username'] }}</h3>
                <p class="display-4"><small>{{ $card['jumlah_draft'] }} artikel</small></p>
            </div>
            
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Cari judul artikel .....">
            <button class="search-button" id="search-button"><i class="fa fa-search"></i></button>
        </div>
        <div class="button-back">
            <a href="/backoffice/artikel"
            class="btn btn-primary btn-sm bg-primary mx-1 text-white detail-button">Kembali</a>
        </div>
        <br>
        <div class="keterangan">
            <p>*Artikel Anda masih dalam draft dan sedang menunggu peninjauan oleh editor sebelum dapat dipublikasikan.</p>
        </div>
        <br><br>

        <!-- Card untuk Tabel Daftar Timses -->
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-center ">
                    <a href="{{ url('/backoffice/addartikel') }}" type="button" class="btn btn-primary rounded-lg">
                        <div class="fa fa-fw fa-plus mr-2"></div> Add Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($card['data_draft'] as $artikel)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td><img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="Dokumentasi"
                                        class="thumbnail"></td>
                                <td>{{ $artikel->category->name }}</td>
                                <td>{{ $artikel->title }}</td>
                                <td class="d-flex">
                                    <a href="/backoffice/preview_draft/{{ $artikel->id }}"
                                        class="btn btn-primary btn-sm bg-primary mx-1 text-white detail-button">Preview</a>
                                    <a href="/backoffice/{{ $artikel->id }}/edit_draft_artikel"
                                        class="btn btn-warning btn-sm bg-warning mx-1 text-black">Edit Data</a>
                                    <form action="{{ url('/backoffice/artikel/' . $artikel->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" name="submit" value="delete"
                                            class="btn btn-sm btn-danger bg-danger mx-1 text-white">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 mt-4">
                    {{ $card['data_draft']->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

<script>
    // Ensure that the modal is working correctly
    $(document).ready(function () {
        // Trigger modal when clicking on the detail button
        $('.detail-button').on('click', function () {
            var targetModal = $(this).data('target');
            $(targetModal).modal('show');
        });
    });

    // Get the preview image element and the fullscreen modal
    const previewImg = document.querySelector('.preview-img');
    const fullscreenModal = document.getElementById('fullscreenImgModal');
    const fullscreenImg = document.getElementById('fullscreenImg');
    const closePreview = document.querySelector('.close-preview');

    // When the user clicks the image, open fullscreen preview
    previewImg.addEventListener('click', function () {
        fullscreenImg.src = this.src; // Set the full image source
        fullscreenModal.style.display = 'flex'; // Show the fullscreen modal
    });

    // Close the fullscreen preview when the user clicks the close button
    closePreview.addEventListener('click', function () {
        fullscreenModal.style.display = 'none'; // Hide the fullscreen modal
    });

    // Also close the fullscreen preview when the user clicks outside the image
    fullscreenModal.addEventListener('click', function (event) {
        if (event.target !== fullscreenImg) {
            fullscreenModal.style.display = 'none';
        }
    });

</script>
<script>
    // Fungsi debouncing untuk optimasi pencarian
    function debounce(func, delay) {
        let debounceTimer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        };
    }

    // Fungsi untuk melakukan filter pencarian
    function filterSearch() {
        const searchValue = document.getElementById('search').value.toLowerCase();
        const tableRows = document.querySelectorAll('.table tbody tr');

        tableRows.forEach(function (row) {
            const column3 = row.querySelector('td:nth-child(3)') ? .textContent
                .toLowerCase(); // Optional Chaining untuk kolom 3

            // Filter hanya berdasarkan kolom ke-3
            if (column3 && column3.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Debounce untuk optimasi pencarian
    const debouncedSearch = debounce(filterSearch, 300);

    // Event listener untuk tombol pencarian
    document.getElementById('search-button').addEventListener('click', filterSearch);

    // Event listener untuk input pencarian dengan debounce
    document.getElementById('search').addEventListener('input', debouncedSearch);

</script>


@endsection
