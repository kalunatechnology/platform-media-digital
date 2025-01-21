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
            padding: 20px;
            /* Add padding to avoid content sticking to the edges */
            margin: 0 2px 10px 2px;
            /* Reduce left-right margin */
        }

        .social-icons1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
        }

        .social-icons1 a {
            display: block;
            width: 40px;
            height: 40px;
            transition: transform 0.3s ease;
        }

        .social-icons1 a:hover {
            transform: scale(1.1);
        }

        /* Image Styling */
        .social-icon1 {
            width: 100%;
            height: auto;
            border-radius: 50%;
            transition: filter 0.3s ease;
        }

        .social-icon1:hover {
            filter: grayscale(100%);
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
            font-size: 18px;
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

        .recent-posts ul {
            list-style: none;
        }

        .recent-posts ul li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .right-sidebar {
            flex: 1;
            max-width: 25%;
        }

        .categories,
        .latest-posts {
            margin-bottom: 20px;
            margin: 0 auto;
            /* Center the content */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            /* Add padding to avoid content sticking to the edges */
            margin: 0 20px 20px 20px;
            /* Increase left-right margin */
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
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
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
            gap: 15px;
            margin-bottom: 15px;
        }

        .carousel-item img {
            width: 100%;
            /* Gambar memenuhi kontainer */
            height: 100%;
            /* Gambar memenuhi kontainer */
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
        }

        .image-wrapper {
            width: 60px;
            /* Dimensi kotak */
            height: 60px;
            /* Dimensi kotak */
            overflow: hidden;
            /* Memotong gambar yang berlebih */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            /* Membuat sudut melengkung */
            background: #f0f0f0;
            /* Memberikan latar belakang jika gambar belum dimuat */
        }

        .carousel-item p {
            font-size: 14px;
            line-height: 1.5;
            color: #333;
            margin: 0;
        }

        .carousel-controls {
            display: flex;
            justify-content: flex-end;
            margin-top: 5px;
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

    <!-- CONTENT -->

    <!-- Banner Section -->
    <div class="banner">
        <img src="images/image1.jpg" alt="News Thumbnail" style="width: 100%; height: 500px; object-fit: cover;">
    </div>


    <!-- Main Container -->
    <div class="container">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <div class="social-icons1">
                <a href="#" title="Share on Facebook">
                    <img src="images/facebook.png" alt="Facebook" class="social-icon1">
                </a>
                <a href="#" title="Share on X">
                    <img src="images/x.png" alt="X" class="social-icon1">
                </a>
                <a href="#" title="Share on Instagram">
                    <img src="images/instagram.png" alt="Instagram" class="social-icon1">
                </a>
                <a href="#" title="Share on Twitter">
                    <img src="images/tiktok.png" alt="Twitter" class="social-icon1">
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="category">Teknologi</div>
            <h1>Judul Berita 1</h1>
            <div class="meta-info">
                <img src="images/user-icon.png" alt="Author">
                <span>By Author Name</span>
                <span>5 comments</span>
                <span>2 min read</span>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt repellendus quam delectus dolor.
                    Ipsa, ducimus sint? Soluta, sapiente! Velit ad similique, ullam eius ipsam est ipsa sit omnis error
                    eveniet quibusdam repellendus exercitationem explicabo laboriosam assumenda, possimus voluptatum,
                    vitae quasi fugiat sequi repudiandae. Eos quia, alias doloribus sequi ex saepe aspernatur corporis
                    eum quisquam nemo. Sed officia dignissimos reprehenderit minus tenetur aperiam quasi vitae veritatis
                    eligendi cum architecto dolorum eaque dicta eveniet accusantium molestiae quidem, rerum enim
                    sapiente. Quam voluptatem, reiciendis iste quisquam non quia molestiae magni blanditiis nobis vel.
                    Labore deleniti libero ipsam ullam! Voluptatum quia provident cumque, suscipit nostrum delectus a
                    iure? Incidunt recusandae placeat accusantium deleniti mollitia ut consequatur tempora voluptatibus,
                    cumque vero similique quibusdam vitae quos natus sint. Ipsam, tempore! Dignissimos animi distinctio
                    perspiciatis consequatur quae molestias vitae repudiandae, quas soluta nesciunt esse, ipsa eos
                    ipsam, minima corporis quidem fuga itaque rerum. Laboriosam cum quis nobis molestiae doloremque quia
                    quod inventore, cupiditate, quas neque nisi distinctio unde voluptas. Nostrum placeat sint rerum
                    quos iste ipsum est adipisci modi? Explicabo, voluptate! Nemo sequi maiores, dolorum nulla cumque
                    magnam ipsum, sed eaque quis reprehenderit assumenda officia dolor laudantium iste quibusdam eius
                    quisquam obcaecati quaerat perspiciatis voluptatem debitis? Laboriosam numquam quam doloremque ad
                    temporibus tenetur praesentium, odio cupiditate perferendis! Pariatur, animi quaerat. Esse delectus
                    labore praesentium aperiam voluptatum quae tenetur est debitis quis dolores tempora nam porro,
                    adipisci doloremque optio accusamus nulla reprehenderit aut numquam. Beatae, nihil dignissimos.
                    Corrupti, officia omnis, at iusto vero earum officiis dolorem rem cupiditate nesciunt modi
                    consequatur voluptas ut sequi nam quos consequuntur quasi laboriosam doloribus magni temporibus
                    iste? Quae deleniti aspernatur laborum voluptatibus illum, odio, ut laboriosam recusandae quibusdam
                    accusantium cumque, quas repellendus dolorem libero? Sunt quae at voluptatibus eum natus veritatis
                    eveniet tenetur ea, facere ducimus magnam labore, consectetur animi reprehenderit voluptatem ipsa!
                    Maxime tenetur est, alias facere vero molestias eligendi cumque nisi earum quam nostrum eum
                    voluptatem sequi dicta laborum harum nesciunt natus quis sint magni vel aliquam fuga ipsam quaerat?
                    Quisquam sit tempora reiciendis ab quidem, nemo exercitationem itaque assumenda harum nulla
                    temporibus sunt obcaecati consequatur. Quo fugiat eaque earum aliquid corporis ipsum quaerat? Vitae
                    obcaecati quisquam incidunt error velit quam quae? Tenetur consequatur obcaecati maxime optio
                    ratione porro quam perferendis. Maiores, totam nulla nemo, incidunt nihil veniam laborum debitis
                    aliquid odio facere ratione, eaque soluta dolor enim accusamus esse inventore corrupti pariatur vero
                    similique beatae perferendis. A, doloremque. Eius similique, qui iste voluptatibus totam asperiores
                    modi cupiditate culpa. Voluptates fugit quos sed temporibus facere. Reprehenderit, enim! Saepe nemo
                    rerum perspiciatis odit recusandae cumque, debitis corrupti ex fuga distinctio, illo at totam
                    accusantium repudiandae quibusdam amet? Saepe corrupti ad neque at maxime iusto repellat recusandae
                    itaque voluptate, consequuntur aspernatur ab in pariatur magni aperiam, dolorum sequi vitae quas
                    ipsam unde! Tempore ipsam recusandae optio consequatur esse ab quia corporis voluptatem, et
                    doloremque ratione atque? Laudantium quo obcaecati consectetur incidunt explicabo odit reiciendis
                    tempora excepturi earum accusantium possimus quas cum blanditiis sed minima praesentium soluta
                    recusandae repellat natus ab similique eius, libero officia. Pariatur aspernatur obcaecati placeat
                    soluta alias. Accusantium illo eligendi autem nisi magni? Cum odit assumenda tempore doloremque
                    praesentium, distinctio exercitationem placeat consequuntur inventore porro! Tenetur ratione dolor
                    quibusdam unde distinctio totam, iste earum perferendis dicta nesciunt, voluptas assumenda vero eum
                    culpa beatae dolores odit debitis dolorem? Vero assumenda, et omnis expedita commodi pariatur
                    architecto nesciunt, perspiciatis repudiandae nemo dolor. Nostrum repudiandae non, accusamus quia
                    consequatur nesciunt qui eveniet recusandae natus nihil maiores vitae explicabo ipsum repellat nemo
                    ut vel necessitatibus saepe magni, corrupti neque tempore sequi. Ullam nobis sequi recusandae porro
                    eum est, sunt cupiditate deserunt hic neque quos ad iure! Adipisci fugit voluptatem aperiam aut,
                    incidunt vero quas cum at, sequi magnam voluptates dignissimos cumque dolores, blanditiis culpa?
                    Eos, ducimus. Harum modi placeat fugit, ducimus aperiam atque maxime. Necessitatibus temporibus a
                    dignissimos accusantium magnam! Dolore quo delectus voluptate, odit doloremque necessitatibus
                    perspiciatis maxime quisquam odio at! Debitis, neque quis? Assumenda distinctio dolorem similique
                    doloribus rem sed accusamus pariatur laboriosam expedita facilis? Explicabo, rerum odio debitis enim
                    error hic suscipit, totam culpa doloribus neque nam quasi esse incidunt aspernatur, exercitationem
                    accusamus pariatur quas obcaecati perferendis a placeat! Vero, cupiditate rem. Libero ipsam odio ex
                    omnis unde nulla fugiat tempore exercitationem iste, quisquam ab qui in ea minus at? Delectus
                    recusandae, totam quidem dignissimos dicta numquam hic cumque excepturi et. Omnis dicta aut
                    voluptate ullam molestias recusandae officiis vero fugit libero perspiciatis labore minima fuga,
                    quidem a similique neque facilis quo laudantium distinctio sed dolorum fugiat eum nulla deserunt!
                    Sunt cumque laudantium ipsa sit voluptas voluptatibus dignissimos harum. At provident illum libero
                    sed. Corporis eius aliquid nobis deleniti reiciendis praesentium, omnis quo dolorem ullam quod
                    eveniet officia sit sint aperiam aliquam, minus odit harum iure labore commodi quam! Quae illo eum
                    illum sint, repudiandae ipsum magnam officiis repellendus nisi, nobis voluptatum id expedita iusto
                    numquam obcaecati similique voluptates, laboriosam ab quibusdam debitis saepe itaque. Unde assumenda
                    sit similique, nemo consequatur error fugiat qui, ad magni nobis eligendi sed ducimus dignissimos
                    autem. Voluptate sequi impedit aliquam eaque perferendis soluta ad et, neque dolores recusandae
                    beatae, voluptatum amet voluptatem excepturi obcaecati sed tenetur earum, veritatis repudiandae nam
                    in magnam est? Blanditiis consectetur voluptatibus corporis eaque impedit repudiandae saepe sed,
                    nihil assumenda illo porro reiciendis aliquam itaque quisquam tempora placeat vero ipsa quaerat sunt
                    sapiente. Dignissimos voluptas ex consequuntur sequi recusandae architecto. Cupiditate rerum facilis
                    perferendis odit sint porro eaque harum suscipit libero deserunt! Provident blanditiis odio tempora
                    nihil consequuntur soluta, molestiae aperiam quaerat maiores dolores aliquid doloremque iste omnis
                    facilis sit quos adipisci porro amet ab. Debitis magni, ratione eos, similique, alias nihil omnis
                    aperiam nobis eligendi laboriosam animi? Illo blanditiis dolorem doloremque optio quidem quos quis
                    provident magnam ipsa veritatis! Tempore, necessitatibus dolore earum accusamus dolorem ea nisi
                    harum aliquid perspiciatis, soluta nobis eius porro illum unde molestias modi repudiandae cupiditate
                    dignissimos? Sit ducimus ullam omnis minima? Consequatur, porro? Voluptates minus deleniti commodi
                    animi optio quod! Et sequi vitae modi optio quos itaque, dolorum ipsam. Voluptate nisi eum fugiat
                    asperiores!</p>
            </div>

            <div class="divider"></div>

            <div class="author-profile">
                <img src="images/user-icon.png" alt="Author">
                <div class="author-info">
                    <h3>Author Name</h3>
                    <p>Short description about the author.</p>
                    <div class="author-actions">
                        <button>View All Posts</button>
                        <a href="#">Copy</a>
                        <a href="#">Social Links</a>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="recent-posts">
                <h3>Recent Posts</h3>
                <ul>
                    <li>Post 1</li>
                    <li>Post 2</li>
                    <li>Post 3</li>
                </ul>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <div class="categories">
                <h3>Kategori</h3>
                <ul>
                    <li>
                        <a href="/kategori/category1" class="category-link category1">
                            Kategori 1
                            <span class="category-count" style="background-color: #ff5733;">12</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="/kategori/category2" class="category-link category2">
                            Kategori 2
                            <span class="category-count" style="background-color: #33c3ff;">8</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="/kategori/category3" class="category-link category3">
                            Kategori 3
                            <span class="category-count" style="background-color: #28a745;">20</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="/kategori/category4" class="category-link category4">
                            Kategori 4
                            <span class="category-count" style="background-color: #ffc107;">15</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                    <li>
                        <a href="/kategori/category5" class="category-link category5">
                            Kategori 5
                            <span class="category-count" style="background-color: #6f42c1;">5</span>
                        </a>
                    </li>
                    <div class="divider"></div>
                </ul>
            </div>

            <div class="latest-posts">
                <h3>Recent Posts</h3>
                <div class="carousel-controls">
                    <button class="carousel-btn prev">&lt;</button>
                    <button class="carousel-btn next">&gt;</button>
                </div>
                <div class="carousel-container">
    <ul class="carousel">
        <li class="carousel-item">
            <div class="image-wrapper">
                <img src="images/image1.jpg" alt="Post Thumbnail">
            </div>
            <p>Everything you ever need to know about flowers</p>
        </li>
        <li class="carousel-item">
            <div class="image-wrapper">
                <img src="images/image2.jpg" alt="Post Thumbnail">
            </div>
            <p>Coffee and lemons don’t go together that well</p>
        </li>
        <li class="carousel-item">
            <div class="image-wrapper">
                <img src="images/image3.jpg" alt="Post Thumbnail">
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
