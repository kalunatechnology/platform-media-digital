<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>HMNS Perfume - Tokopedia Style Responsive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .text-artikel-title:hover{
            color: blueviolet;
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
            <img src="https://images.tokopedia.net/img/cache/215-square/GAnVPX/2022/10/6/bc1cc268-50f7-4c52-b7f1-4011ec60ffb7.jpg"
                alt="HMNS Logo" class="store-logo">
            <div>
                <h5 class="mb-0 fw-bold">Nama Penulis <span class="text-primary"><i
                            class="bi bi-patch-check-fill"></i></span></h5>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    {{-- <button class="btn btn-success btn-sm">Follow</button>
                    <button class="btn btn-outline-success btn-sm">Chat Penjual</button> --}}
                    <p>deskripsi kepribasia</p>
                </div>
            </div>
            <div class="ms-auto text-center store-info-text d-flex gap-4 flex-wrap">
                <div>
                    <strong class="text-dark">⭐ 100</strong><br>
                    <small class="text-muted">Artikel Diterbitkan</small>
                </div>
                <div>
                    <strong class="text-dark">± 4 jam</strong><br>
                    <small class="text-muted">Komentar</small>
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
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil obcaecati quod accusantium est nulla pariatur distinctio temporibus a, vitae qui dolorum magnam autem possimus praesentium numquam reprehenderit ea sit provident.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quo eum explicabo quaerat, adipisci ea iusto! Consequuntur, officia maxime. Quaerat expedita, in sunt veniam corrupti voluptatibus deleniti maiores quam dolorum!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum cum eius velit quisquam qui blanditiis maxime facilis repudiandae libero earum. Unde dolorum magni odio officiis! Asperiores eaque facilis nobis dignissimos iste cupiditate hic natus eos impedit vitae autem ullam, omnis officia alias accusamus reprehenderit repudiandae veritatis porro incidunt quasi dolor. Est minima nemo illo beatae aliquam rem molestiae provident velit architecto doloribus? Deserunt deleniti, aliquid at blanditiis ad odit voluptate eos pariatur ipsa nulla officiis delectus repellendus totam veniam in numquam? Doloremque veniam iste repellendus adipisci repellat cum soluta ipsam inventore? Eum animi dolore voluptatibus officia qui exercitationem corporis debitis. Exercitationem ex accusamus facere necessitatibus assumenda facilis voluptate veritatis quam alias eligendi doloribus modi cum eum dolore, pariatur iure recusandae ipsa. Ea fugit et laudantium debitis harum commodi deleniti voluptatum voluptates, eligendi hic, dolore autem, alias sit fuga sunt. Adipisci pariatur voluptate ea nihil cumque cupiditate accusamus eum, error soluta tempore iusto odit non aliquam, hic exercitationem explicabo enim quibusdam. Laudantium neque quibusdam ab repudiandae! Perspiciatis, ipsam aliquid! Consequatur rem nam laudantium sequi iste enim animi modi quibusdam obcaecati voluptate corrupti officia, cupiditate sed nostrum eligendi molestiae dicta accusantium eveniet laboriosam, ea non quae ipsum. Laboriosam iure aliquid a iste.
            </div>
            <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-3">Produk Terlaris</h5>
                <div class="row g-3">
                    <!-- Contoh produk (copy blok ini untuk tambah produk) -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card position-relative h-100">
                            <span class="badge badge-custom">Terlaris</span>
                            <img src="https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/2/1/f65b3fe3-f26b-474b-b14f-0c8a2990d301.jpg"
                                class="product-image" alt="ORGAZM">
                            <div class="p-3">
                                <h6 class="mb-1"><a href="" class="text-artikel-title">HMNS Perfume - The Perfection 100ml</a></h6>
                                <small>Rp323.000</small>
                            </div>
                        </div>
                    </div>

                    <!-- Tambahan produk lainnya -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card position-relative h-100">
                            <span class="badge badge-special">Spesial Untukmu</span>
                            <img src="https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/10/30/48b2b041-e7e5-40fa-b8df-2b8eb24f1d10.jpg"
                                class="product-image" alt="Alpha">
                            <div class="p-3">
                                <h6 class="mb-1"><a href=""  class="text-artikel-title">HMNS Perfume - The Perfection 100ml</a></h6>
                                <small>Rp320.000</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card position-relative h-100">
                            <span class="badge badge-special">Spesial Untukmu</span>
                            <img src="https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/2/1/95bcfb52-f5a6-40c2-8a34-17217bca2b2f.jpg"
                                class="product-image" alt="Farhampton">
                            <div class="p-3">
                                <h6 class="mb-1"><a href="" class="text-artikel-title">HMNS Perfume - The Perfection 100ml</a></h6>
                                <small>Rp369.000</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card position-relative h-100">
                            <span class="badge badge-custom">Terlaris</span>
                            <img src="https://images.tokopedia.net/img/cache/200-square/VqbcmM/2022/9/6/93c4d902-cd9d-456d-8dc8-21a0d3976d9a.jpg"
                                class="product-image" alt="The Perfection">
                            <div class="p-3">
                                <h6 class="mb-1"><a href="" class="text-artikel-title">HMNS Perfume - The Perfection 100ml</a></h6>
                                <small>Rp398.000</small>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
