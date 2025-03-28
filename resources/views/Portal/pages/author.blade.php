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
            .navbar-links.active {
                display: flex;
            }

            .navbar-toggle {
                display: flex;
            }

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


        .container {
            display: flex;
            justify-content: space-between;
            /* Agar h1 dan search sejajar dengan space di antara */
            align-items: center;
            /* Sejajarkan secara vertikal */
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .search-container input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        hr {
            border: none;
            height: 2px;
            background-color: #ddd;
            margin: 20px auto;
            width: 90%;
        }

        .authors {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .author-card {
            background: linear-gradient(135deg, #ffffff, #f8f8f8);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: black;
        }

        .author-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .author-card img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ddd;
            margin-bottom: 12px;
        }
        .author-card p {
            color: #000;
        }

        /* ✅ Pastikan ukuran h3 konsisten */
        h3 {
            font-size: 18px;
            font-weight: bold;
            position: relative;
            display: block;
            text-align: center;
            width: 100%;
            min-height: 24px;
            /* Menyesuaikan tinggi agar tetap rapi */
            padding-bottom: 5px;
        }

        /* ✅ Efek Underline Loading yang Selalu Tengah */
        h3::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -3px;
            width: 0;
            height: 2px;
            background: red;
            transition: width 0.4s ease-in-out;
            transform: translateX(-50%);
        }

        .author-card:hover h3::after {
            width: 80%;
            /* Gunakan persentase agar tetap proporsional */
        }


        .pagination-container {
            text-align: center;
            margin: 20px 0;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 5px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination a.active {
            background-color: red;
            color: white;
            border: none;
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
                <a href="{{ url('/login') }}" class="btn-login">Login</a>
                <a href="{{ url('/registrasi') }}" class="btn-register">Register</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>INDEKS PENULIS</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Cari Penulis" onkeyup="filterAuthors()">
        </div>
    </div>

    <hr>

    <section class="authors" id="authorList">
        <!-- Data dari AJAX akan muncul di sini -->
    </section>

    <section class="pagination-container">
        <div id="pagination" class="pagination"></div>
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
        document.getElementById("searchInput").addEventListener("keyup", function () {
            loadAuthors(1, this.value);
        });

        async function loadAuthors(page = 1, search = "") {
            let response = await fetch(`/api/get-authors?page=${page}&search=${search}`);
            let data = await response.json();

            let authorList = document.getElementById("authorList");
            let pagination = document.getElementById("pagination");

            authorList.innerHTML = "";

            data.data.forEach(author => {
                let authorSlug = encodeURIComponent(author.name); // Encode name untuk URL
                authorList.innerHTML += `
                <a href="/author/${authorSlug}" class="author-card">
                    <img src="${author.photos ? '/storage/' + author.photos : 'images/user-icon.png'}" alt="${author.name}">
                    <h3>${author.name}</h3>
                    <p>${author.description || 'Penulis dan kontributor.'}</p>
                </a>
            `;
            });

            pagination.innerHTML = "";

            if (data.prev_page_url) {
                pagination.innerHTML +=
                    `<button onclick="loadAuthors(${data.current_page - 1}, '${search}')">Prev</button>`;
            }

            for (let i = 1; i <= data.last_page; i++) {
                pagination.innerHTML +=
                    `<button onclick="loadAuthors(${i}, '${search}')" ${i === data.current_page ? 'style="font-weight: bold;"' : ''}>${i}</button>`;
            }

            if (data.next_page_url) {
                pagination.innerHTML +=
                    `<button onclick="loadAuthors(${data.current_page + 1}, '${search}')">Next</button>`;
            }
        }

        loadAuthors();

    </script>
