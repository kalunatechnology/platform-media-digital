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

/* Container Kategori */
.categories {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    text-align: center;
}

/* Judul */
.categories h2 {
    font-size: 32px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
    color: #222; /* Warna teks */
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
    
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
    width: 60%;
    height: 4px;
    background: linear-gradient(to right, #ff7eb3, #ff758c);
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


/* Grid Layout (2 per baris) */
.category-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    justify-content: center;
}

/* Style Kartu */
.category-card {
    position: relative;
    height: 180px;
    border-radius: 16px;
    overflow: hidden;
}

/* Link dalam Kartu */
.category-card a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    text-decoration: none;
    position: relative;
    background-size: cover;
    background-position: center;
    border-radius: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
}

/* Efek Hover */
.category-card a:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
    opacity: 0.85;
}

/* Overlay Gelap saat Hover */
.category-card a::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    transition: background 0.3s ease;
    z-index: 1;
}

.category-card a:hover::before {
    background: rgba(0, 0, 0, 0.6);
}

/* Teks dalam Kartu */
.category-card span {
    font-size: 26px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.9), 
                 0px 0px 8px rgba(255, 255, 255, 0.6);
    position: relative;
    z-index: 2;
    transition: text-shadow 0.3s ease-in-out;
}

.category-card a:hover span {
    text-shadow: 3px 3px 15px rgba(0, 0, 0, 1), 
                 0px 0px 12px rgba(255, 255, 255, 0.9);
}

/* Responsif untuk Mobile */
@media (max-width: 768px) {
    .category-list {
        grid-template-columns: repeat(1, 1fr);
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
            <div class="navbar-actions">
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
            <button class="navbar-toggle" id="navbar-toggle">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
        </div>
    </nav>

    <div class="categories">
    <h2>Kategori Berita</h2>

    <hr>

    <div class="category-list">
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/politik.jpg');">
            <span>Politik</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/ekonomi.jpg');">
            <span>Ekonomi</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/teknologi.png');">
            <span>Teknologi</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/kesehatan.jpg');">
            <span>Kesehatan</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/olahraga.jpg');">
            <span>Olahraga</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/hiburan.jpg');">
            <span>Hiburan</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/internasional.jpg');">
            <span>Internasional</span>
        </a>
    </div>
    <div class="category-card">
        <a href="/category/detailcategory" style="background-image: url('images/nasional.jpg');">
            <span>Nasional</span>
        </a>
    </div>
</div>

</div>



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

        navbarToggle.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
        });

    </script>