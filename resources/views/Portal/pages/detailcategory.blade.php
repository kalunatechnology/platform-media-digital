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
                margin-top: 10px;
            }
        }

        /* Adding JS to toggle navbar */
        @media screen and (max-width: 768px) {
            #navbar-toggle:checked~.navbar-links {
                display: flex;
            }
        }

        .detail-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Judul */
        .categories h2 {
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            color: #000;
            /* Warna teks */
            position: relative;
            display: inline-block;

            /* Animasi muncul */
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.8s ease-in-out forwards;
        }

        /* Efek highlight di bawah teks */
        .categories h2::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 100%;
            height: 4px;
            transform: translateX(-50%);
            border-radius: 10px;
        }

        /* Animasi Fade-In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        hr {
            border: none;
            height: 2px;
            background-color: #ddd;
            margin: 20px auto;
            width: 90%;
        }

        /* Card Besar */
        .big-card {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            /* Sedikit lebih sempit */
            margin: 0 auto 40px;
            /* Memusatkan card */
            position: relative;
        }

        .category-tag {
            position: absolute;
            top: 35px;
            left: 35px;
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            /* Diperkecil */
            font-weight: bold;
            border-radius: 5px;
            z-index: 2;
            /* Pastikan tag kategori selalu di atas konten */
        }

        .big-card-image {
            width: 100%;
            height: 250px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        .big-card-content {
            margin-top: 15px;
        }

        .big-card-content h3 a {
            color: black;
            text-decoration: none;
            position: relative;
            font-size: 20px;
            margin: 10px 0;
        }

        .big-card-content h3 a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff5722;
            transition: width 0.5s ease;
        }

        .big-card-content h3 a:hover::after {
            width: 100%;
        }

        .big-card-content p {
            font-size: 14px;
            color: #555;
        }

        .author-and-views {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
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

        .views {
            font-size: 14px;
            color: #555;
        }

        .views i {
            margin-right: 5px;
        }

        /* Card Grid */
        .category-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 kolom */
            gap: 20px;
        }

        .news-card {
            display: none;
            /* Semua card disembunyikan awalnya */
        }

        .news-card.show {
            display: block;
            /* Card yang memiliki class show akan ditampilkan */
        }

        .news-card {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .news-image {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        .news-content {
            margin-top: 10px;
        }

        .news-content h3 a {
            color: black;
            text-decoration: none;
            position: relative;
            font-size: 20px;
            margin: 10px 0;
        }

        .news-content h3 a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff5722;
            transition: width 0.7s ease;
        }

        .news-content h3 a:hover::after {
            width: 100%;
        }

        .news-content p {
            font-size: 14px;
            color: #555;
        }

        .author-and-views {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
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

        .views {
            font-size: 14px;
            color: #555;
        }

        .views i {
            margin-right: 5px;
        }

        /* Membuat seluruh card dapat diklik */
        .news-card a,
        .big-card a {
            display: block;
            text-decoration: none;
            color: inherit;
            /* Pastikan teks tetap terlihat */
        }

        /* Styling Button Load More */
        .load-more {
            display: inline-block;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            margin: 20px auto;
            display: block;
        }

        .load-more:hover {
            background-color: #2980b9;
        }

        .load-more:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }


        /* Responsiveness untuk mobile */
        @media (max-width: 768px) {
            .category-cards {
                grid-template-columns: 1fr;
            }

            .big-card {
                width: 100%;
                flex-direction: column;
            }

            .big-card-image {
                height: 200px;
            }

            .category-tag {
                font-size: 11px;
            }

            .news-image {
                height: 200px;
            }

            .category-tag {
                font-size: 11px;
            }
        }

        /* Footer Styling */
        .custom-footer {
            background-image: url('/images/footer.jpg');
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
            width: 200px;
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
                <a href="{{ url('/login') }}" class="btn-login">Login</a>
                <a href="{{ url('/registrasi') }}" class="btn-register">Register</a>
            </div>
        </div>
    </nav>

    <div class="detail-section">
        <div class="categories">
            <h2>Kategori Berita - TEKNOLOGI</h2>
            <hr>

            <div class="category-detail">
                <!-- Card Besar di atas -->
                <div class="big-card">
                    <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                    <div class="big-card-image" style="background-image: url('/images/image1.jpg');"></div>
                    <div class="big-card-content">
                        <h3><a href="#">Revolusi Teknologi di Tahun 2024</a></h3>
                        <p>Teknologi terus berkembang pesat, berikut adalah beberapa tren yang perlu Anda ketahui...</p>
                    </div>
                    <div class="author-and-views">
                        <div class="author">
                            <img src="images/user-icon.png" alt="Author">
                            <span>By John Doe</span>
                        </div>
                        <div class="views">
                            <i class="fas fa-eye"></i> 1200 Views
                        </div>
                    </div>
                </div>

                <!-- Card Grid di bawah -->
                <div class="category-cards">
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image2.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards here -->
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image1.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image3.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image1.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image2.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image3.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>

                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image2.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards here -->
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image1.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image3.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image1.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image2.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="category-tag">Teknologi</div> <!-- Tag Category -->
                        <div class="news-image" style="background-image: url('/images/image3.jpg');"></div>
                        <div class="news-content">
                            <h3><a href="#">Inovasi Teknologi di 2024</a></h3>
                            <p>Inovasi terbaru yang akan mengubah cara kita berinteraksi dengan teknologi.</p>
                        </div>
                        <div class="author-and-views">
                            <div class="author">
                                <img src="images/user-icon.png" alt="Author">
                                <span>By Jane Smith</span>
                            </div>
                            <div class="views">
                                <i class="fas fa-eye"></i> 900 Views
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="load-more">Lihat Selanjutnya</button>
        </div>
    </div>


    <footer class="custom-footer">
        <div class="custom-footer-container">
            <!-- Left Section: Logo and Name -->
            <div class="custom-footer-left">
                <img src="/images/footer-logo.png" alt="Portal Beritaku" class="custom-footer-logo">
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
                        <img src="{{ URL::asset('images/facebook-bw.png') }}" alt="Facebook" class="social-icon-bw">
                        <img src="{{ URL::asset('images/facebook.png') }}" alt="Facebook" class="social-icon-color">
                    </a>
                    <a href="https://x.com" target="_blank" class="social-icon x">
                        <img src="{{ URL::asset('images/x-bw.png') }}" alt="X" class="social-icon-bw">
                        <img src="{{ URL::asset('images/x.png') }}" alt="X" class="social-icon-color">
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon instagram">
                        <img src="{{ URL::asset('images/instagram-bw.png') }}" alt="Instagram" class="social-icon-bw">
                        <img src="{{ URL::asset('images/instagram.png') }}" alt="Instagram" class="social-icon-color">
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="social-icon tiktok">
                        <img src="{{ URL::asset('images/tiktok-bw.png') }}" alt="TikTok" class="social-icon-bw">
                        <img src="{{ URL::asset('images/tiktok.png') }}" alt="TikTok" class="social-icon-color">
                    </a>
                </div>
            </div>
        </div>
    </footer>

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
        document.addEventListener("DOMContentLoaded", function () {
            const cards = document.querySelectorAll('.news-card'); // Ambil semua card
            const loadMoreButton = document.querySelector('.load-more');
            let currentVisibleCards = 6; // Mulai dengan menampilkan 6 card pertama

            // Fungsi untuk menampilkan card berdasarkan jumlah yang ingin ditampilkan
            function showCards() {
                for (let i = 0; i < currentVisibleCards; i++) {
                    if (cards[i]) {
                        cards[i].classList.add('show'); // Menampilkan card
                    }
                }

                // Jika semua card sudah ditampilkan, sembunyikan tombol
                if (currentVisibleCards >= cards.length) {
                    loadMoreButton.style.display = 'none'; // Sembunyikan tombol jika tidak ada card lagi
                }
            }

            // Menambah 3 card setiap tombol diklik
            loadMoreButton.addEventListener('click', function () {
                currentVisibleCards += 3;
                showCards();
            });

            // Tampilkan 6 card pertama saat halaman dimuat
            showCards();
        });

    </script>
