<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>HMNS Perfume - Tokopedia Style Responsive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/73c0197af7.js" crossorigin="anonymous"></script>

    <style>
        .store-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .store-logo {
                width: 60px;
                height: 60px;
            }

            .store-info-text {
                justify-content: flex-start !important;
                text-align: left !important;
            }
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
            text-decoration:
        }

        .store-box {
            border: 1px solid #e0e0e0;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }


        .product-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .badge-custom,
        .badge-special {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.75rem;
            padding: 4px 6px;
            border-radius: 5px;
        }

        .badge-custom {
            background-color: #ffc107;
            color: #000;
        }

        .badge-special {
            background-color: #28a745;
            color: #fff;
        }

        .product-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .text-artikel-title {
            text-decoration: none;
            color: black;
        }

        .text-artikel-title:hover {
            color: blueviolet;
        }

        .custom-pagination {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 8px;
        }

        .custom-pagination li a {
            display: block;
            padding: 8px 14px;
            background-color: #f2f2f2;
            border-radius: 6px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .custom-pagination li a:hover {
            background-color: #d4d4d4;
        }

        .custom-pagination li.active a {
            background-color: #1f883d;
            color: white;
            font-weight: bold;
        }

        .custom-pagination li.disabled a {
            opacity: 0.5;
            pointer-events: none;
        }


        @media (max-width: 576px) {
            .product-image {
                height: 160px;
            }
        }

        .store-header {
            flex-wrap: wrap;
        }

        .store-header>div {
            flex: 1 1 100%;
            margin-top: 10px;
        }

        @media (min-width: 768px) {
            .store-header>div {
                flex: initial;
                margin-top: 0;
            }
        }

    </style>
</head>

<body>

    <div class="container mt-4">
        <!-- Store Info -->
        <div class="store-box p-3 mb-4 rounded shadow-sm bg-white d-flex align-items-center flex-wrap gap-3">
            <div id="user-photos-profile">
            <img src="https://images.tokopedia.net/img/cache/215-square/GAnVPX/2022/10/6/bc1cc268-50f7-4c52-b7f1-4011ec60ffb7.jpg"
                alt="HMNS Logo" class="store-logo">
            </div>
            <div>
                <h5 class="mb-0 fw-bold" id="nama-penulis"></h5>
                <div class="d-flex flex-wrap gap-2 mt-2" id="user-deskrispsi">
                    {{-- <button class="btn btn-success btn-sm">Follow</button>
                    <button class="btn btn-outline-success btn-sm">Chat Penjual</button> --}}
                    
                </div>
            </div>
            <div class="ms-auto text-center store-info-text d-flex gap-4 flex-wrap">
                <div>
                    <div id="articleCount">

                    </div>
                </div>
                <div>
                    <div id="commentCount">

                    </div>
                </div>
                {{-- <div>
                    <strong class="text-dark">10:00 - 19:00</strong><br>
                    <small class="text-muted">Jam operasi toko</small>
                </div> --}}
            </div>
        </div>


        <!-- Tabs -->
        <!-- Navigasi Tab -->
        <!-- Navigasi Tab -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="beranda-tab" data-bs-toggle="tab" href="#beranda" role="tab"
                    aria-controls="beranda" aria-selected="true">Sekilas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="produk-tab" data-bs-toggle="tab" href="#produk" role="tab"
                    aria-controls="produk" aria-selected="false">Artikel Diterbitkan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ulasan-tab" data-bs-toggle="tab" href="#ulasan" role="tab"
                    aria-controls="ulasan" aria-selected="false">Ulasan & Komentar</a>
            </li>
        </ul>

        <!-- Konten Tab -->
        <div class="tab-content mt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="beranda" role="tabpanel" aria-labelledby="beranda-tab">

            </div>
            <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-3">Artikel </h5>
                <div class="row g-3" id="artikel-row">


                </div>
                <div class="pagination-container d-flex justify-content-center mt-4">
                    <ul class="custom-pagination"></ul>
                </div>
            </div>
            <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
                fszzz
            </div>
        </div>





        <!-- Produk Terlaris -->

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Pastikan jQuery sudah disertakan -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Fungsi untuk memuat konten saat tab diklik
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href"); // Mendapatkan target tab
                var url = $(e.target).data("url"); // Mendapatkan URL dari atribut data-url

                if (url) {
                    $(target).load(url); // Memuat konten dari URL ke dalam tab
                }
            });
        });

    </script>
    <script>
        let slug = "{{ $user->slug }}";

        $(document).ready(function () {
            loadArticles(); // Load halaman pertama

            // Event handler untuk klik pagination
            $(document).on('click', '.custom-pagination li:not(.disabled) a', function (e) {
                e.preventDefault();
                const page = $(this).data('page');
                if (page) {
                    loadArticles(page);
                }
            });
        });

        function loadArticles(page = 1) {
            $.ajax({
                url: `/api/author/${slug}/articles?page=${page}`,
                type: 'GET',
                success: function (response) {
                    renderArticles(response.articles.data);
                    renderPagination(response.articles);
                    renderUserBiography(response.user);
                    renderUserphotos(response.user);
                    renderUsername(response.user);
                    renderUserDescription(response.user);
                    renderPublishedArticlesCount(response.published_articles_count);
                    renderCommentCount(response.total_comments);
                },
                error: function (xhr) {
                    console.error("Gagal mengambil data artikel:", xhr);
                }
            });
        }

        function renderArticles(articles) {
            let html = '';
            articles.forEach(article => {
                html += `
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product-card position-relative h-100">
                    <span class="badge badge-custom">${article.category.name}</span>
                    <img src="${article.thumbnail ? '/storage/' + article.thumbnail : 'images/default.jpg'}" class="product-image" alt="${article.title}">
                    <div class="p-3">
                        <h6 class="mb-1">
                            <a href="/article/${article.slug}" class="text-artikel-title">${article.title}</a>
                        </h6>
                        <br>
                        <small>Dibaca ${article.views_count} kali</small>
                    </div>
                </div>
            </div>`;
            });

            $('#artikel-row').html(html);
        }

        function renderPagination(pagination) {
            let html = '';
            const current = pagination.current_page;
            const last = pagination.last_page;

            // Tombol First
            html += `<li class="${!pagination.prev_page_url ? 'disabled' : ''}">
                    <a href="#" data-page="1"><i class="bi bi-chevron-double-left"></i></a>
                 </li>`;

            // Tombol Previous
            html += `<li class="${!pagination.prev_page_url ? 'disabled' : ''}">
                    <a href="#" data-page="${current - 1}"><i class="bi bi-chevron-left"></i></a>
                 </li>`;

            // Looping nomor halaman (bisa disesuaikan agar hanya tampil range tertentu)
            for (let i = 1; i <= last; i++) {
                html += `<li class="${i === current ? 'active' : ''}">
                        <a href="#" data-page="${i}">${i}</a>
                     </li>`;
            }

            // Tombol Next
            html += `<li class="${!pagination.next_page_url ? 'disabled' : ''}">
                    <a href="#" data-page="${current + 1}"><i class="bi bi-chevron-right"></i></a>
                 </li>`;

            // Tombol Last
            html += `<li class="${!pagination.next_page_url ? 'disabled' : ''}">
                    <a href="#" data-page="${last}"><i class="bi bi-chevron-double-right"></i></a>
                 </li>`;

            $('.pagination-container ul.custom-pagination').html(html);
        }

        function renderUserphotos(user) {
            let Userphotoshtml = '';
            const UserPhotos = user.photos
                            ? `/storage/${user.photos}`
                            : '/images/user-icon.png'; ;
            Userphotoshtml += `            <img src="${UserPhotos}"
                alt="HMNS Logo" class="store-logo">
                 `;

            $('#user-photos-profile').html(Userphotoshtml);

        }

        function renderUserBiography(user) {
            const biography = user.biography || '';
            $('#beranda').html(biography);
        }

        function renderUsername(user) {
            let Usernamehtml = '';
            const Username = user.name ;
            Usernamehtml += `${Username} <span class="text-primary"></span>
                 `;

            $('#nama-penulis').html(Usernamehtml);

        }

        function renderUserDescription(user) {
            let Userdeskripsihtml = '';
            const Userdeskripsi = user.description ;
            Userdeskripsihtml += `<p>${Userdeskripsi}</p>`;

            $('#user-deskrispsi').html(Userdeskripsihtml);

        }

        function renderPublishedArticlesCount(published_articles_count) {
            let articleCounthtml = '';
            const articleCount = published_articles_count ;
            articleCounthtml += `<strong class="text-dark"><i class="fa-regular fa-newspaper" style="color: #74C0FC;"></i> &nbsp;
                            ${articleCount}</strong><br>
                        <small class="text-muted">Artikel Diterbitkan</small>`;

            $('#articleCount').html(articleCounthtml);

        }

        function renderCommentCount(commentCount) {
            let commentCounthtml = '';
            const commentsCount = commentCount ;
            commentCounthtml += `<strong class="text-dark"><i class="fa-solid fa-comment" style="color: #74C0FC;"></i> &nbsp; ${commentsCount}</strong><br>
                        <small class="text-muted">Komentar</small>`;

            $('#commentCount').html(commentCounthtml);

        }

    </script>



</body>

</html>
