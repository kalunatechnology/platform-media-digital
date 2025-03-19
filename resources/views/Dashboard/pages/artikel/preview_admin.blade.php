<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            /* Set all text to black */
        }


        /* General Navbar Styles */
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
            padding: 10px 20px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar-logo a {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        .navbar-links li a {
            text-decoration: none;
            color: #555;
            font-size: 16px;
            transition: color 0.3s;
        }

        .navbar-links li a:hover {
            color: #ff5722;
        }

        /* Navbar Actions */
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Search Box */
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 20px;
            overflow: hidden;
            margin-right: 15px;
        }

        .search-box input {
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            outline: none;
            width: 150px;
            transition: width 0.3s;
        }

        .search-box input:focus {
            width: 200px;
        }

        .search-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px 10px;
        }

        .search-button svg {
            width: 20px;
            height: 20px;
        }

        /* Buttons */
        .btn-login,
        .btn-register {
            text-decoration: none;
            margin-left: 10px;
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-login {
            background-color: #3498db;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #2980b9;
        }

        .btn-register {
            background-color: #2ecc71;
            color: #fff;
        }

        .btn-register:hover {
            background-color: #27ae60;
        }

        /* Navbar Toggle (Burger Icon) */
        .navbar-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .toggle-bar {
            width: 25px;
            height: 3px;
            background-color: #333;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .navbar-links {
                display: none;
                flex-direction: column;
                background-color: #fff;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                padding: 10px 0;
                border-top: 1px solid #ddd;
            }

            .navbar-links.active {
                display: flex;
            }

            .navbar-toggle {
                display: flex;
            }

            .navbar-actions {
                display: none;
            }
            .navbar-actions.active {
                display: block;
                flex-direction: column;
                background-color: #fff;
                position: absolute;
                top: 90px;
                left: 0;
                width: 100%;
                padding: 10px 0;
                border-top: 1px solid #ddd;
            }

            .search-box {
                width: 100%;
                margin-top: 10px;
            }

            .search-box input {
                width: 100%;
            }

            .btn-login,
            .btn-register {
                margin-left: 0;
                margin-top: 10px;
            }
        }

        /* Adding JS to toggle navbar */
        @media screen and (max-width: 768px) {
            #navbar-toggle:checked~.navbar-links {
                display: flex;
            }
        }

        /* CONTENT */

        /* Layout */
        .banner {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .container {
            display: flex;
            margin: 20px auto;
            max-width: 1200px;
            gap: 20px;
        }

        .left-sidebar {
            flex: 1;
            max-width: 5%;
            position: sticky;
            top: 100px;
            height: 100%;
            background-color: whitesmoke;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            /* Add padding to avoid content sticking to the edges */
            margin: 0 2px 10px 2px;
            /* Reduce left-right margin */
        }

        .social-icons1 {
            display: flex;
            flex-direction: column;
            /* Mengatur agar ikon ditata secara vertikal */
            gap: 10px;
            /* Mengurangi jarak antar ikon */
        }

        .social-icons1 a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .social-icons1 a:hover {
            transform: scale(1.1);
            /* Memberikan efek zoom sedikit pada hover */
        }

        .social-icon1 {
            width: 30px;
            /* Ukuran tetap untuk ikon */
            height: 30px;
            /* Ukuran tetap untuk ikon */
            object-fit: contain;
            /* Pastikan gambar tidak terdistorsi */
        }

        /* Tambahkan efek hover untuk ikon */
        .social-icons1 a:hover .social-icon1 {
            opacity: 0.8;
            /* Mengurangi opacity saat di-hover */
        }

        .main-content {
            flex: 3;
            max-width: 75%;
            margin: 0 auto;
            /* Center the content */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 70px;
            /* Add padding to avoid content sticking to the edges */
            margin: 0 10px 20px 10px;
            /* Reduce left-right margin */
        }

        .main-content .category {
            padding: 5px 10px;
            color: black;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
            background-color: #2980b9;
            border-radius: 10px;
        }

        .main-content h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .meta-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            color: #888;
            font-size: 14px;
        }

        .meta-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .content {
            margin-bottom: 40px;
            width: 90%;
            text-align: justify;
        }
        .content img {
            max-width: 120%;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .author-profile {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .author-profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .author-info {
            flex: 1;
        }

        .author-info h3 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .author-info p {
            font-size: 14px;
            color: #666;
        }

        .author-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .author-actions button,
        .author-actions a {
            background: #ddd;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
        }

        .recent-posts {
            padding: 20px;
        }

        .recent-posts h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .articles-list {
            display: grid;
            grid-template-columns: 1fr;
            /* Hanya satu artikel per baris */
            gap: 20px;
        }

        .news-card {
            display: flex;
            gap: 15px;
            /* Ruang antara gambar dan konten */
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .news-image {
            width: 30%;
            /* Lebar gambar 30% */
            height: 150px;
            /* Sesuaikan tinggi gambar */
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        .news-content {
            flex: 1;
        }

        .category {
            padding: 2px 6px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .news-content h3 a {
            display: inline-block;
            color: black;
            text-decoration: none;
            position: relative;
            font-size: 18px;
        }

        .news-content h3 a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff5722;
            transition: width 0.3s ease;
        }

        .news-content h3 a:hover::after {
            width: 100%;
        }

        .news-content p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .author {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: black;
        }

        .author img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .articles-list {
                grid-template-columns: 1fr;
                /* Tetap 1 kolom pada tablet */
            }

            .news-card {
                flex-direction: column;
                /* Gambar berada di atas teks pada layar kecil */
            }

            .news-image {
                width: 100%;
                /* Gambar 100% lebar pada tablet */
                height: 150px;
                /* Sesuaikan tinggi gambar */
            }
        }

        @media (max-width: 480px) {
            .articles-list {
                grid-template-columns: 1fr;
                /* Tetap 1 kolom pada ponsel */
            }

            .news-card {
                flex-direction: column;
                /* Gambar berada di atas teks pada layar kecil */
            }

            .news-image {
                width: 100%;
                /* Gambar 100% lebar pada ponsel */
                height: 150px;
                /* Sesuaikan tinggi gambar */
            }
        }


        /* Section Komentar */
        .comment-section {
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .comment-section h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .comment-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .comment-form label {
            font-size: 16px;
            color: #333;
        }

        .comment-form input,
        .comment-form textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        .comment-form button {
            padding: 10px 15px;
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .comment-form button:hover {
            background-color: #e64a19;
        }

        .comment-list {
            margin-top: 30px;
        }

        .comment {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .comment-author {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .comment-text {
            font-size: 14px;
            color: #555;
        }

        /* Responsivitas */
        @media (max-width: 768px) {

            .comment-form input,
            .comment-form textarea {
                font-size: 14px;
            }

            .comment-form button {
                font-size: 14px;
                padding: 10px;
            }

            .comment-list .comment {
                padding: 10px;
            }

            .comment-author {
                font-size: 13px;
            }

            .comment-text {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {

            .comment-form input,
            .comment-form textarea {
                font-size: 13px;
                padding: 8px;
            }

            .comment-form button {
                font-size: 13px;
                padding: 8px;
            }

            .comment-list .comment {
                padding: 8px;
            }
        }




        .right-sidebar {
            flex: 1;
            max-width: 30%;
            /* Lebarkan sidebar */
        }

        .categories,
        .latest-posts {
            margin-bottom: 20px;
            margin: 0 auto;
            /* Center the content */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            /* Padding tetap untuk kenyamanan */
            margin: 0 40px 20px 40px;
            /* Tambahkan margin kiri-kanan lebih besar */
            max-width: 90%;
            /* Card lebih lebar, sesuaikan proporsi */
            width: 100%;
            /* Card memenuhi ruang sidebar */
        }

        .categories ul,
        .latest-posts ul {
            list-style: none;
            padding: 0;
        }

        .categories ul li,
        .latest-posts ul li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        /* General link styling */
        /* General link styling */
        .category-link {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 4px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        /* Divider styling */
        .divider {
            height: 1px;
            background-color: #ddd;
            margin: 8px 0;
        }

        /* Category Count Styling */
        /* General link styling */
        .category-link {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 4px;
            transition: transform 0.3s ease, color 0.3s ease;
            position: relative;
        }

        /* Divider styling */
        .divider {
            height: 1px;
            background-color: #ddd;
            margin: 8px 0;
        }

        /* Category Count Styling */
        .category-count {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            transition: transform 0.3s ease;
        }

        /* Hover effects */
        .category-link:hover {
            transform: translateX(10px);
            /* Slight forward animation */
        }

        .category1:hover {
            color: #ff5733;
        }

        .category2:hover {
            color: #33c3ff;
        }

        .category3:hover {
            color: #28a745;
        }

        .category4:hover {
            color: #ffc107;
        }

        .category5:hover {
            color: #6f42c1;
        }

        /* Latest Post */

        .latest-posts h3 {
            display: flex;
            justify-content: space-between;
            /* Menyebarkan ruang antara judul dan tombol */
            align-items: center;
            /* Menjaga agar tombol dan teks sejajar vertikal */
            font-size: 24px;
            margin-bottom: 20px;
        }

        .carousel-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .carousel-btn:hover {
            color: #ff5722;
            /* Mengubah warna tombol saat hover */
        }

        .latest-posts h3 .carousel-btn {
            margin-left: 20px;
            /* Memberikan jarak antara tombol dan judul */
        }

        .carousel-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .carousel {
            display: flex;
            flex-direction: column;
            /* Arrange items vertically */
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .carousel-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .carousel-item:hover {
            transform: translateY(-5px);
            /* Card melayang sedikit ke atas */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih dalam */
        }

        .carousel-item .image-wrapper {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            overflow: hidden;
            border-radius: 10px;
            position: relative;
        }

        .carousel-item .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
            /* Tambahkan transisi untuk opacity */
        }

        .carousel-item:hover .image-wrapper img {
            opacity: 0.7;
            /* Gambar akan sedikit transparan saat di-hover */
        }

        .carousel-item p {
            margin: 0;
            font-size: 14px;
            color: #333;
            transition: color 0.3s ease;
            /* Tambahkan transisi untuk warna teks */
        }

        .carousel-item:hover p {
            color: #ff5722;
            /* Judul berubah warna menjadi #ff5722 saat di-hover */
        }


        .carousel-controls {
            display: flex;
            justify-content: flex-end;
            margin: 20px 0;
            gap: 5px;
        }

        .carousel-btn {
            background-color: #f5f5f5;
            border: none;
            color: #666;
            font-size: 14px;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, background-color 0.2s;
        }

        .carousel-btn:hover {
            background-color: #ddd;
            transform: scale(1.1);
        }





        .carousel-controls {
            display: flex;
            justify-content: space-between;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-sidebar,
            .main-content,
            .right-sidebar {
                max-width: 100%;
            }

            .social-icons {
                flex-direction: row;
                gap: 10px;
            }

            .social-icons a {
                width: 30px;
                height: 30px;
                font-size: 16px;
            }
        }

        /* Footer Styling */
        .custom-footer {
            background-image: url('{{ asset("images/footer.jpg") }}');
            background-size: cover;
            background-position: center;
            color: black;
            padding: 40px 20px;
        }

        .custom-footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        /* Left Section: Logo and Name */
        .custom-footer-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .custom-footer-logo {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .custom-footer-portal-name {
            font-size: 24px;
            font-weight: bold;
            color: black;
        }

        /* Middle Section: Explore Links */
        .custom-footer-center {
            text-align: center;
        }

        .custom-footer-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: black;
        }

        .custom-footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .custom-footer-links li {
            margin-bottom: 10px;
        }

        .custom-footer-links a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .custom-footer-links a:hover {
            color: #e74c3c;
        }

        /* Right Section: Social Media */
        .custom-footer-right {
            text-align: center;
        }

        .custom-footer-social-icons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .social-icon {
            position: relative;
            width: 40px;
            height: 40px;
            display: inline-block;
        }

        .social-icon-bw,
        .social-icon-color {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.3s;
        }

        .social-icon-bw {
            opacity: 1;
        }

        .social-icon-color {
            opacity: 0;
        }

        .social-icon:hover .social-icon-bw {
            opacity: 0;
        }

        .social-icon:hover .social-icon-color {
            opacity: 1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .custom-footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .custom-footer-left {
                align-items: center;
            }

            .custom-footer-social-icons {
                justify-content: center;
            }
        }

    </style>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <a href="#">Ini Halaman Preview Konten Artikel Anda</a>
            </div>
            <button class="navbar-toggle" id="navbar-toggle">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
            <div class="navbar-actions" id="navbar-actions">
                <a href="/backoffice/draft_articles_admin" class="btn-login">Kembali ke draft</a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->

    <!-- Banner Section -->
    <div class="banner">
        <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="News Thumbnail" style="width: 100%; height: 500px; object-fit: cover;">
    </div>


    <!-- Main Container -->
    <div class="container">
    
        <!-- Main Content -->
        <div class="main-content">
            <div class="category">{{ $data->category->name }}</div>
            <h1>{{ $data->title }}</h1>
            <div class="meta-info">
                <img src="{{ $data->user && $data->user->photos ? asset('storage/' . $data->user->photos) : asset('images/user-icon.png') }}" 
                alt="Author" class="img-fluid rounded-circle" width="100">
                <span>{{ $data->user->name }}</span>
                <span>5 comments</span>
                <span>{{ $data->time ?? '?' }} min read</span>
            </div>
    
            <div class="content">
                <p>{!! $data->content !!}</p>
            </div>
    
            <div class="divider"></div>
    
            <div class="author-profile">
                <img src="{{ $data->user && $data->user->photos ? asset('storage/' . $data->user->photos) : asset('images/user-icon.png') }}" 
                alt="Author" class="img-fluid rounded-circle" width="100">
                <div class="author-info">
                    <h3>{{ $data->user->name }}</h3>
                    <div class="author-actions">
                        <button>View All Posts</button>
                        <a href="#">Copy</a>
                        <a href="#">Social Links</a>
                    </div>
                </div>
            </div>
            <div class="divider"></div>

            <div class="recent-posts">
                <h3>Artikel Penulis</h3>
                <div class="articles-list">
                    <div class="news-card">
                        <div class="news-image" style="background-image: url('{{ asset('images/image1.jpg') }}');"></div>
                        <div class="news-content">
                            <span class="category" style="background-color: #3498db;">Teknologi</span>
                            <h3><a href="#">Revolusi Teknologi di Tahun 2024</a></h3>
                            <div class="author">
                                <img src="{{ asset('images/user-icon.png') }}" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="news-image" style="background-image: url('{{ asset('images/image2.jpg') }}');"></div>
                        <div class="news-content">
                            <span class="category" style="background-color: #e74c3c;">Ekonomi</span>
                            <h3><a href="#">Ekonomi Digital: Peluang dan Tantangan</a></h3>
                            <div class="author">
                                <img src="{{ asset('images/user-icon.png') }}" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="news-image" style="background-image: url('{{ asset('images/image3.jpg') }}');"></div>
                        <div class="news-content">
                            <span class="category" style="background-color: #2ecc71;">Lingkungan</span>
                            <h3><a href="#">Menyelamatkan Bumi: Langkah-langkah Sederhana</a></h3>
                            <div class="author">
                                <img src="{{ asset('images/user-icon.png') }}" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Berikan Komentar Section -->
            <div class="comment-section">
                <h3>Berikan Komentar</h3>
                <form class="comment-form">
                    <label for="comment">Komentar:</label>
                    <textarea id="comment" name="comment" placeholder="Tulis komentar Anda disini..."
                        required></textarea>

                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" placeholder="Nama Anda" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email Anda" required>

                    <label for="city">Asal Kota:</label>
                    <input type="text" id="city" name="city" placeholder="Kota Asal Anda" required>

                    <button>Submit Comment</button>
                </form>

                <!-- Comment List -->
                <div class="comment-list">
                    <!-- Example of posted comments -->
                    <div class="comment">
                        <div class="comment-author">John Doe (Semarang)</div>
                        <p class="comment-text">Revolusi Teknologi di tahun 2024 sangat menarik, terutama di bidang AI!
                        </p>
                    </div>
                    <div class="comment">
                        <div class="comment-author">Jane Smith (Yogyakarta)</div>
                        <p class="comment-text">Saya setuju dengan perkembangan teknologi yang dijelaskan. Banyak
                            potensi yang bisa dimanfaatkan.</p>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="right-sidebar">
            <div class="categories">
                <h3>Kategori</h3>
                <ul>
                    <li>
                        <a href="#" class="category-link category1">
                            Kategori 1
                            <span class="category-count" style="background-color: #ff5733;">12</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="/ada" class="category-link category2">
                            Kategori 2
                            <span class="category-count" style="background-color: #33c3ff;">8</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="#" class="category-link category3">
                            Kategori 3
                            <span class="category-count" style="background-color: #28a745;">20</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="#" class="category-link category4">
                            Kategori 4
                            <span class="category-count" style="background-color: #ffc107;">15</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="#" class="category-link category5">
                            Kategori 5
                            <span class="category-count" style="background-color: #6f42c1;">5</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                </ul>
            </div>

            <div class="latest-posts">
                <h3>
                    Postingan Terakhir
                    <button class="carousel-btn prev">&lt;</button>
                    <button class="carousel-btn next">&gt;</button>
                </h3>
                <div class="carousel-container">
                    <ul class="carousel">
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image1.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Everything you ever need to know about flowers</p>
                        </li>
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image2.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Coffee and lemons don’t go together that well</p>
                        </li>
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image3.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Did you know that plants actually have a secret life?</p>
                        </li>
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image2.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Everything you ever need to know about flowers</p>
                        </li>
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image3.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Coffee and lemons don’t go together that well</p>
                        </li>
                        <li class="carousel-item">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/image1.jpg') }}" alt="Post Thumbnail">
                            </div>
                            <p>Did you know that plants actually have a secret life?</p>
                        </li>
                    </ul>
                </div>
                

            </div>


        </div>
    </div>
    

    <footer class="custom-footer">
        <div class="custom-footer-container">
            <!-- Left Section: Logo and Name -->
            <div class="custom-footer-left">
                <img src="{{ asset('images/logo.png') }}" alt="Portal Beritaku" class="custom-footer-logo">
                <h3 class="custom-footer-portal-name">Portal Beritaku</h3>
            </div>
    
            <!-- Middle Section: Explore Links -->
            <div class="custom-footer-center">
                <h4 class="custom-footer-title">Telusuri</h4>
                <ul class="custom-footer-links">
                    <li><a href="#">Teknologi</a></li>
                    <li><a href="#">Pariwisata</a></li>
                    <li><a href="#">Ekonomi</a></li>
                    <li><a href="#">Olahraga</a></li>
                </ul>
            </div>
    
            <!-- Right Section: Social Media -->
            <div class="custom-footer-right">
                <h4 class="custom-footer-title">Ikuti Kami</h4>
                <div class="custom-footer-social-icons">
                    <a href="https://facebook.com" target="_blank" class="social-icon facebook">
                        <img src="{{ asset('images/facebook-bw.png') }}" alt="Facebook" class="social-icon-bw">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="social-icon-color">
                    </a>
                    <a href="https://x.com" target="_blank" class="social-icon x">
                        <img src="{{ asset('images/x-bw.png') }}" alt="X" class="social-icon-bw">
                        <img src="{{ asset('images/x.png') }}" alt="X" class="social-icon-color">
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon instagram">
                        <img src="{{ asset('images/instagram-bw.png') }}" alt="Instagram" class="social-icon-bw">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="social-icon-color">
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="social-icon tiktok">
                        <img src="{{ asset('images/tiktok-bw.png') }}" alt="TikTok" class="social-icon-bw">
                        <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" class="social-icon-color">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    

    <script>
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbarActions = document.getElementById('navbar-actions');

        navbarToggle.addEventListener('click', () => {
            navbarActions.classList.toggle('active');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carousel = document.querySelector('.carousel');
            const items = Array.from(carousel.children);
            const prevButton = document.querySelector('.carousel-btn.prev');
            const nextButton = document.querySelector('.carousel-btn.next');

            let currentIndex = 0;

            const updateCarousel = () => {
                items.forEach((item, index) => {
                    item.style.display = index >= currentIndex && index < currentIndex + 3 ?
                        'flex' : 'none';
                });
            };

            prevButton.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentIndex < items.length - 3) {
                    currentIndex++;
                    updateCarousel();
                }
            });

            updateCarousel(); // Initialize carousel
        });

    </script>
