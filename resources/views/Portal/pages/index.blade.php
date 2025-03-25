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


        /* Navbar Styles */
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
                top: 39px;
                left: 0;
                width: 100%;
                padding: 15px 15px;
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
                top: 277px;
                left: 0;
                width: 100%;
                padding: 15px 15px;
            }

            .search-box {
                width: 100%;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .search-box input {
                width: 100%;
            }

            .btn-login,
            .btn-register {
                margin-left: 0;
                margin-top: 20px;
            }
        }

        /* Adding JS to toggle navbar */
        @media screen and (max-width: 768px) {
            #navbar-toggle:checked~.navbar-links {
                display: flex;
            }
        }


        /* CONTAINER */
        .container1 {
            padding: 0px;
        }

        .carousel-container {
            width: 100%;
            max-width: 100vw;
            /* Pastikan tidak ada overflow */
            overflow: hidden;
            /* Cegah elemen keluar dari viewport */
        }

        .carousel-container>div {
            display: flex;
            justify-content: space-between;
            flex-wrap: nowrap;
            /* Agar item tidak turun ke bawah */
        }


        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            position: relative;
            color: white;
            text-align: left;
            background-size: cover;
            background-position: center;
            height: 700px;
        }

        .carousel-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .carousel-item .content {
            position: absolute;
            bottom: 20%;
            left: 20%;
            /* Adjusted margin-left for centering */
            z-index: 2;
            width: 60%;
            /* Adjusted width for aesthetics */
            max-width: 500px;
            margin-right: auto;
            /* Center align relative to width */
            text-align: left;
        }

        .carousel-item .category {
            font-size: 14px;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .carousel-item h2 {
            font-size: 36px;
            margin: 5px 0;
            font-weight: bold;
        }

        .carousel-item p {
            font-size: 16px;
            margin: 10px 0;
        }

        .carousel-item .author {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-top: 100px;
            /* Added spacing */
            gap: 10px;
            /* Added spacing between elements */
        }

        .carousel-item .author img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        .carousel-buttons {
            position: absolute;
            top: 60%;
            right: 20%;
            /* Adjusted margin-right for centering */
            transform: translateY(-50%);
            z-index: 3;
            display: flex;
            gap: 10px;
        }

        .carousel-buttons button {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s, transform 0.2s;
        }

        .carousel-buttons button:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
            /* Added hover scale effect */
        }

        /* Responsif: Menyusun tombol di sisi kanan dan kiri pada perangkat mobile */
        @media (max-width: 768px) {
            .carousel-item h2 {
                font-size: 24px;
                margin: 5px 0;
                font-weight: bold;
            }

            .carousel-item p {
                font-size: 16px;

            }

            .carousel-buttons {
                top: 90%;
            }

            .carousel-item .author {
                margin-top: 10px;
            }
        }

        /* Jika layar lebih besar dari 768px, tombol bisa berada di posisi default */
        @media (min-width: 769px) {

            .carousel-prev,
            .carousel-next {
                display: block;
                /* Tombol tampil seperti biasa */
            }
        }

        /* SECTION NEWS */
        .news-section {
            display: flex;
            gap: 30px;
            padding: 30px;
            margin: 0 10%;
        }

        /* LEFT COLUMN */
        .left-column {
            flex: 1;
        }

        .left-column h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .news-card {
            display: flex;
            gap: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }


        .news-image {
            width: 30%;
            max-height: 70%;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        .news-content {
            flex: 1;
        }

        .category {
            padding: 5px 10px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }


        .news-content h3 a {
            display: inline-block;
            color: black;
            text-decoration: none;
            position: relative;
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

        .author1 {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: white;
        }

        .author1 img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 10px;
        }



        /* Mobile View */
        @media (max-width: 768px) {
            .news-section {
                flex-direction: column;
            }

            .left-column {
                max-width: 100%;
            }

            .news-card {
                flex-direction: column;
            }

            .news-image {
                width: 100%;
                height: 200px;
                /* You can adjust the height accordingly */
            }

            .news-content {
                padding: 10px;
            }

            .category {
                font-size: 0.9rem;
            }

            h3 {
                font-size: 1rem;
            }

            .author img {
                width: 25px;
            }
        }

        /* RIGHT COLUMN */
        .right-column {
            flex: 1;
        }

        .right-column h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Dua kolom */
            gap: 20px;
            /* Jarak antar card */
            padding: 20px;
            margin: 0 auto;
            /* Center alignment */
            max-width: 1200px;
            /* Batas lebar untuk container */
        }

        .card {
            position: relative;
            max-width: 250px;
            /* Perbesar ukuran card */
            max-height: 300px;
            /* Tinggi card */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.5);
            /* Memberikan opacity pada gambar */
        }

        .card-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            /* Posisi konten di bawah */
            padding: 20px;
            /* Jarak margin kiri untuk estetika */
        }

        .category-label {
            position: absolute;
            top: 15px;
            left: 20px;
            background-color: #f39c12;
            color: #fff;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 18px;
            /* Ukuran font judul */
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .author-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-name {
            font-size: 14px;
            color: #ddd;
            font-weight: 500;
        }



        /* Responsif */
        @media (max-width: 768px) {
            .card {
                width: 100%;
                height: 200px;
                /* Tinggi lebih kecil untuk layar kecil */
            }

            .card-container {
                grid-template-columns: 1fr;
                /* One card per row on smaller screens */
            }

            .card-content {
                padding: 15px;
            }

            .category-label {
                top: 10px;
                left: 15px;
            }

            .card-title {
                font-size: 16px;
            }

            .author-name {
                font-size: 12px;
            }
        }


        /* Divider Vertikal */
        .divider {
            width: 1px;
            /* Lebar garis pemisah */
            background-color: rgba(0, 0, 0, 0.2);
            /* Warna garis */
            height: 100%;
            /* Garis sepanjang tinggi container */
        }

        /* Highlight pada Judul Kiri */
        .highlight-left {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 5px;
        }

        /* Highlight pada Judul Kanan */
        .highlight-right {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 5px;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            .news-section {
                flex-direction: column;
                gap: 20px;
            }

            .mini-grid {
                grid-template-columns: 1fr;
            }

            .container {
                flex-direction: column;
                /* Mengubah kolom menjadi baris pada perangkat mobile */
                gap: 10px;
                /* Mengurangi jarak antar kolom */
            }

            .divider {
                display: none;
                /* Sembunyikan divider pada perangkat mobile */
            }
        }

        /* Khusus untuk Section Ini */
        .latest-news-section {
            background-color: #000;
            padding: 50px 20px;
            color: #fff;
        }

        .latest-news-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .latest-news-title {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }

        .latest-news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .latest-news-card {
            background: #fff;
            /* Warna card menjadi putih */
            color: #000;
            /* Warna teks diubah menjadi hitam */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            /* Dibutuhkan untuk posisi absolute tag kategori */
            overflow: hidden;
            /* Pastikan konten tidak keluar dari card */
        }


        .latest-news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .latest-news-card .news-category {
            position: absolute;
            /* Membuatnya di atas gambar */
            top: 30px;
            /* Jarak dari atas gambar */
            left: 30px;
            /* Jarak dari kiri gambar */
            background: rgba(255, 87, 34, 0.8);
            /* Warna semi-transparan */
            color: white;
            /* Warna teks putih */
            padding: 5px 10px;
            font-size: 12px;
            font-weight: bold;
            border-radius: 5px;
            z-index: 2;
            /* Memastikan berada di atas gambar */
            opacity: 1;
            /* Pastikan terlihat secara default */
            transition: opacity 0.3s ease;
            /* Opsional untuk animasi saat hover */
        }

        .latest-news-card img {
            width: 100%;
            /* Gambar memenuhi lebar card */
            height: 200px;
            /* Tinggi gambar tetap konsisten */
            object-fit: cover;
            /* Gambar menyesuaikan ruang tanpa distorsi */
            border-top-left-radius: 8px;
            /* Menyesuaikan dengan card */
            border-top-right-radius: 8px;
        }

        .latest-news-card h3 {
            font-size: 20px;
            margin: 10px 0;
            color: black;
        }

        .latest-news-card h3 a {
            color: black;
            text-decoration: none;
            position: relative;
        }

        .latest-news-card h3 a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff5722;
            transition: width 0.3s ease;
        }

        .latest-news-card h3 a:hover::after {
            width: 100%;
        }

        .latest-news-card p {
            font-size: 14px;
            margin-bottom: 15px;
            color: black;
        }

        .latest-news-card .news-meta {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: black;
            align-items: center;
        }

        .latest-news-card .news-meta .date i {
            margin-right: 5px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .latest-news-title {
                font-size: 28px;
            }

            .latest-news-card {
                padding: 15px;
            }

            .latest-news-card h3 {
                font-size: 18px;
            }

            .latest-news-card .news-meta {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* Section Styling */
        .authors-popular-section {
            background-color: #f7f3ef;
            padding: 40px 20px;
        }

        .authors-popular-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .authors-popular-columns-wrapper {
            display: flex;
            gap: 40px;
            border-top: 3px solid #ddd;
            padding-top: 30px;
        }

        .authors-popular-column {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Titles */
        .authors-popular-section-title {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
            border-bottom: 3px solid #e74c3c;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Author List */
        .authors-popular-author-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .authors-popular-author-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }

        .authors-popular-author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e74c3c;
        }

        .authors-popular-author-details {
            flex: 1;
        }

        .authors-popular-author-name {
            font-size: 18px;
            font-weight: bold;
            color: #34495e;
            margin: 0;
        }

        .authors-popular-author-bio {
            font-size: 14px;
            color: #7f8c8d;
            margin: 5px 0 0;
        }

        /* Popular News List */
        .authors-popular-news-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .authors-popular-news-list li {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .authors-popular-news-title {
            font-size: 18px;
            font-weight: bold;
            color: #34495e;
            margin: 0 0 5px;
        }

        .authors-popular-news-info {
            font-size: 14px;
            color: #7f8c8d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .authors-popular-columns-wrapper {
                flex-direction: column;
                gap: 20px;
            }
        }

        /* Footer Styling */
        .custom-footer {
            background-image: url('images/footer.jpg');
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
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <a href="#">Portal Berita</a>
            </div>
            <ul class="navbar-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Berita</a></li>
                <li><a href="#">Teknologi</a></li>
                <li><a href="#">Gaya Hidup</a></li>
                <li><a href="#">Bisnis</a></li>
            </ul>
            <button class="navbar-toggle" id="navbar-toggle">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
            <div class="navbar-actions" id="navbar-actions">
                <div class="search-box">
                    <input type="text" placeholder="Cari berita...">
                    <button class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"
                            fill="#555">
                            <path
                                d="M796 933 571 709q-32 25-70 39.5T420 763q-92 0-156-64t-64-156q0-92 64-156t156-64q92 0 156 64t64 156q0 45-14.5 83T709 709l225 224q11 11 11 26.5T934 986q-11 11-27 11t-27-11ZM420 663q58 0 98.5-40.5T559 524q0-58-40.5-98.5T420 385q-58 0-98.5 40.5T281 524q0 58 40.5 98.5T420 663Z" />
                        </svg>
                    </button>
                </div>
                <a href="#" class="btn-login">Login</a>
                <a href="#" class="btn-register">Register</a>
            </div>
        </div>
    </nav>


    <!-- CONTAINER -->
    <div class="container1">
        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-item" style="background-image: url('images/image1.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <span class="category">Teknologi</span>
                        <h2>Revolusi AI dalam Kehidupan Sehari-hari</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nam debitis reiciendis,
                            nulla culpa explicabo quibusdam, molestiae ex cum molestias, dolorem amet consequatur qui
                            libero.</p>
                        <div class="author1">
                            <img src="images/image1.jpg" alt="Author">
                            <span>By John Doe</span>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('images/image2.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <span class="category">Politik</span>
                        <h2>Debat Calon Presiden 2024</h2>
                        <p>Simak perbandingan visi dan misi para calon presiden dalam debat politik terakhir.</p>
                        <div class="author1">
                            <img src="images/user-icon.png" alt="Author">
                            <span>By Jane Smith</span>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('images/image3.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <span class="category">Ekonomi</span>
                        <h2>Perkembangan Ekonomi Global 2024</h2>
                        <p>Bagaimana ekonomi dunia beradaptasi dengan tantangan besar di tahun 2024.</p>
                        <div class="author1">
                            <img src="images/user-icon.png" alt="Author">
                            <span>By Mark Twain</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-buttons">
                <button onclick="prevSlide()">❮</button>
                <button onclick="nextSlide()">❯</button>
            </div>
        </div>
    </div>

    <!-- NEWS SECTION -->
    <section class="news-section">
        <div class="left-column">
            <h2 class="highlight-left">Rekomendasi Penulis</h2>
            <div class="news-card">
                <div class="news-image" style="background-image: url('images/image1.jpg');"></div>
                <div class="news-content">
                    <span class="category" style="background-color: #3498db;">Teknologi</span>
                    <h3><a href="#">Revolusi Teknologi di Tahun 2024</a></h3>
                    <p>Teknologi terus berkembang pesat, berikut adalah beberapa tren yang perlu Anda ketahui...</p>
                    <div class="author">
                        <img src="images/user-icon.png" alt="Author">
                        <span>By John Doe</span>
                    </div>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image" style="background-image: url('images/image2.jpg');"></div>
                <div class="news-content">
                    <span class="category" style="background-color: #3498db;">Teknologi</span>
                    <h3><a href="#">Revolusi Teknologi di Tahun 2024</a></h3>
                    <p>Teknologi terus berkembang pesat, berikut adalah beberapa tren yang perlu Anda ketahui...</p>
                    <div class="author">
                        <img src="images/user-icon.png" alt="Author">
                        <span>By John Doe</span>
                    </div>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image" style="background-image: url('images/image3.jpg');"></div>
                <div class="news-content">
                    <span class="category" style="background-color: #3498db;">Teknologi</span>
                    <h3><a href="#">Revolusi Teknologi di Tahun 2024</a></h3>
                    <p>Teknologi terus berkembang pesat, berikut adalah beberapa tren yang perlu Anda ketahui...</p>
                    <div class="author">
                        <img src="images/user-icon.png" alt="Author">
                        <span>By John Doe</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="right-column">
            <h2 class="highlight-right">Sedang Dibicarakan</h2>
            <div class="card-container">
                <div class="card">
                    <img src="images/image1.jpg" alt="Berita" class="card-image">
                    <div class="card-content">
                        <span class="category-label">Kategori</span>
                        <h3 class="card-title">Judul Berita</h3>
                        <div class="card-footer">
                            <div class="author1">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="images/image3.jpg" alt="Berita" class="card-image">
                    <div class="card-content">
                        <span class="category-label">Kategori</span>
                        <h3 class="card-title">Judul Berita Lain</h3>
                        <div class="card-footer">
                            <div class="author1">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="images/image2.jpg" alt="Berita" class="card-image">
                    <div class="card-content">
                        <span class="category-label">Kategori</span>
                        <h3 class="card-title">Judul Berita Lain</h3>
                        <div class="card-footer">
                            <div class="author1">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="images/image1.jpg" alt="Berita" class="card-image">
                    <div class="card-content">
                        <span class="category-label">Kategori</span>
                        <h3 class="card-title">Judul Berita</h3>
                        <div class="card-footer">
                            <div class="author1">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By John Doe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card lainnya sesuai kebutuhan -->
            </div>

        </div>
    </section>

    <section class="latest-news-section">
        <div class="latest-news-container">
            <h2 class="latest-news-title">Berita Terakhir</h2>
            <div class="latest-news-grid">
                <div class="latest-news-card">
                    <span class="news-category">Teknologi</span>
                    <img src="images/image1.jpg" alt="News Image">
                    <h3><a href="#">Revolusi AI dalam Kehidupan Sehari-hari</a></h3>
                    <p>Kecerdasan buatan semakin merubah cara kita berinteraksi dengan teknologi.</p>
                    <div class="news-meta">
                        <span class="author">By John Doe</span>
                        <span class="date"><i class="fa fa-calendar"></i> 15 Jan 2025</span>
                    </div>
                </div>
                <div class="latest-news-card">
                    <span class="news-category">Bisnis</span>
                    <img src="images/image2.jpg" alt="News Image">
                    <h3><a href="#">Inovasi Startup Lokal</a></h3>
                    <p>Bagaimana startup lokal terus bersaing di era globalisasi.</p>
                    <div class="news-meta">
                        <span class="author">By Jane Smith</span>
                        <span class="date"><i class="fa fa-calendar"></i> 14 Jan 2025</span>
                    </div>
                </div>
                <div class="latest-news-card">
                    <span class="news-category">Gaya Hidup</span>
                    <img src="images/image3.jpg" alt="News Image">
                    <h3><a href="#">Tren Minimalisme di Tahun 2025</a></h3>
                    <p>Gaya hidup minimalis semakin digemari oleh masyarakat urban.</p>
                    <div class="news-meta">
                        <span class="author">By Alex Brown</span>
                        <span class="date"><i class="fa fa-calendar"></i> 13 Jan 2025</span>
                    </div>
                </div>
                <div class="latest-news-card">
                    <span class="news-category">Bisnis</span>
                    <img src="images/image2.jpg" alt="News Image">
                    <h3><a href="#">Inovasi Startup Lokal</a></h3>
                    <p>Bagaimana startup lokal terus bersaing di era globalisasi.</p>
                    <div class="news-meta">
                        <span class="author">By Jane Smith</span>
                        <span class="date"><i class="fa fa-calendar"></i> 14 Jan 2025</span>
                    </div>
                </div>
                <div class="latest-news-card">
                    <span class="news-category">Gaya Hidup</span>
                    <img src="images/image3.jpg" alt="News Image">
                    <h3><a href="#">Tren Minimalisme di Tahun 2025</a></h3>
                    <p>Gaya hidup minimalis semakin digemari oleh masyarakat urban.</p>
                    <div class="news-meta">
                        <span class="author">By Alex Brown</span>
                        <span class="date"><i class="fa fa-calendar"></i> 13 Jan 2025</span>
                    </div>
                </div>
                <div class="latest-news-card">
                    <span class="news-category">Teknologi</span>
                    <img src="images/image1.jpg" alt="News Image">
                    <h3><a href="#">Revolusi AI dalam Kehidupan Sehari-hari</a></h3>
                    <p>Kecerdasan buatan semakin merubah cara kita berinteraksi dengan teknologi.</p>
                    <div class="news-meta">
                        <span class="author">By John Doe</span>
                        <span class="date"><i class="fa fa-calendar"></i> 15 Jan 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="authors-popular-section">
        <div class="authors-popular-container">
            <div class="authors-popular-columns-wrapper">
                <!-- Left Column: Authors -->
                <div class="authors-popular-column authors-popular-column-authors">
                    <h2 class="authors-popular-section-title">Author</h2>
                    <ul class="authors-popular-author-list">
                        <li>
                            <img src="images/user-icon.png" alt="Author 1" class="authors-popular-author-image">
                            <div class="authors-popular-author-details">
                                <h3 class="authors-popular-author-name">John Doe</h3>
                                <p class="authors-popular-author-bio">Ahli Teknologi dan penulis inovasi.</p>
                            </div>
                        </li>
                        <li>
                            <img src="images/user-icon.png" alt="Author 2" class="authors-popular-author-image">
                            <div class="authors-popular-author-details">
                                <h3 class="authors-popular-author-name">Jane Smith</h3>
                                <p class="authors-popular-author-bio">Pakar Pariwisata dengan banyak karya.</p>
                            </div>
                        </li>
                        <li>
                            <img src="images/user-icon.png" alt="Author 3" class="authors-popular-author-image">
                            <div class="authors-popular-author-details">
                                <h3 class="authors-popular-author-name">Alice Brown</h3>
                                <p class="authors-popular-author-bio">Mengupas Energi Terbarukan.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Right Column: Popular News -->
                <div class="authors-popular-column authors-popular-column-popular-news">
                    <h2 class="authors-popular-section-title">Berita Terpopuler</h2>
                    <ul class="authors-popular-news-list">
                        <li>
                            <h3 class="authors-popular-news-title">Revolusi Teknologi di Tahun 2024</h3>
                            <p class="authors-popular-news-info">Dibaca 10k kali</p>
                        </li>
                        <li>
                            <h3 class="authors-popular-news-title">Keindahan Pariwisata di Indonesia</h3>
                            <p class="authors-popular-news-info">Dibaca 8k kali</p>
                        </li>
                        <li>
                            <h3 class="authors-popular-news-title">Tren Desain Web Modern</h3>
                            <p class="authors-popular-news-info">Dibaca 5k kali</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="custom-footer">
        <div class="custom-footer-container">
            <!-- Left Section: Logo and Name -->
            <div class="custom-footer-left">
                <img src="images/logo.png" alt="Portal Beritaku" class="custom-footer-logo">
                <h3 class="custom-footer-portal-name">Portal Beritaku</h3>
            </div>

            <!-- Middle Section: Explore Links -->
            <div class="custom-footer-center">
                <h4 class="custom-footer-title">Telusuri</h4>
                <ul class="custom-footer-links">
                    <li><a href="/kategori/teknologi">Teknologi</a></li>
                    <li><a href="/kategori/pariwisata">Pariwisata</a></li>
                    <li><a href="/kategori/ekonomi">Ekonomi</a></li>
                    <li><a href="/kategori/olahraga">Olahraga</a></li>
                </ul>
            </div>

            <!-- Right Section: Social Media -->
            <div class="custom-footer-right">
                <h4 class="custom-footer-title">Ikuti Kami</h4>
                <div class="custom-footer-social-icons">
                    <a href="https://facebook.com" target="_blank" class="social-icon facebook">
                        <img src="images/facebook-bw.png" alt="Facebook" class="social-icon-bw">
                        <img src="images/facebook.png" alt="Facebook" class="social-icon-color">
                    </a>
                    <a href="https://x.com" target="_blank" class="social-icon x">
                        <img src="images/x-bw.png" alt="X" class="social-icon-bw">
                        <img src="images/x.png" alt="X" class="social-icon-color">
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon instagram">
                        <img src="images/instagram-bw.png" alt="Instagram" class="social-icon-bw">
                        <img src="images/instagram.png" alt="Instagram" class="social-icon-color">
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="social-icon tiktok">
                        <img src="images/tiktok-bw.png" alt="TikTok" class="social-icon-bw">
                        <img src="images/tiktok.png" alt="TikTok" class="social-icon-color">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to toggle navbar menu visibility
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbarLinks = document.querySelector('.navbar-links');
        const navbarActions = document.getElementById('navbar-actions');


        navbarToggle.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
            navbarActions.classList.toggle('active');
        });

    </script>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.carousel-item');

        function nextSlide() {
            if (currentIndex < slides.length - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarousel();
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = slides.length - 1;
            }
            updateCarousel();
        }

        function updateCarousel() {
            const carousel = document.querySelector('.carousel');
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

    </script>
</body>

</html>
