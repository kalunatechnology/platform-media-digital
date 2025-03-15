@extends('Dashboard.layouts.templates')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style>
    @import 'https://fonts.googleapis.com/css?family=Oswald:700';

    * {
        font-family: 'Poppins', sans-serif;
    }

    .swal2-container {
        justify-content: flex-start;
        align-items: flex-start;
        padding-top: 1rem;
        padding-left: 1rem;
    }

    .navbar-text {
        display: flex;
        align-items: center;
        margin-right: 20px;
        /* Adjust this to position the profile as needed */
    }

    /* kandidat card v1 */

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .profile-image-navbar {
        width: 40px;
        height: 40px;
        border-radius: 80%;
        margin: 0 auto;
        margin-right: 10px;
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

    .card-custom {
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        background: white;
        text-decoration: none;

    }

    .card-text {
        font-weight: bold;
        color: black;
        text-decoration: none;
    }


    .card-icon {
        font-size: 39px;
        align-items: center;
        padding: 10px;
        padding-left: 20px;
    }

    .chart-order {
        height: 330px;
    }

    .chart-customer {
        height: 330px;
    }

    .user-image {
        width: 28px;
    }

    .table-user {
        font-size: 15px;
        justify-content: space-between;
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


    @media (max-width: 768px) {
        .footer .footer-text {
            font-size: 14px;
        }

        .navbar-text {
            flex-direction: column;
            align-items: flex-start;
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
        <div class="container-fluid">
            <div class="row">
                <!-- Card Statistik -->
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>450</h5>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa fa-shopping-cart card-icon text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>450</h5>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa fa-shopping-cart card-icon text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>450</h5>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa fa-shopping-cart card-icon text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="card card-custom shadow-sm">
                        <div class="d-flex">
                            <div class="card-text">
                                <h5>450</h5>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon-dashboard">
                                <i class="fa fa-shopping-cart card-icon text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Grafik Order Summary & Overview -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card p-3 chart-order">
                        <h4>Order Summary</h4>
                        <canvas id="orderSummaryChart" class="text-center"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 chart-customer">
                        <h4>Customer Map</h4>
                        <canvas id="customerMapChart"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex" style="justify-content: space-between;">
                            <h4 class="card-tit">sdad</h4>
                            <a href="#">view all</a>
                        </div>
                        <div class="mt-2">
                            <small><a>Rangking disusun berdasarkan artikel diterbitkan</a></small>
                        </div>
                        <div class="table-user mt-4">
                            <div class="mt-2 repeat-data-rangking" style="justify-content: space-between;">
                                <img class="user-image" src="images/user-icon.png" alt="Author">
                                <span class="ml-2 mr-2"><strong>By Jane Smith</strong></span>
                                <span>700</span>
                            </div>
                            <div class="mt-2 repeat-data-rangking">
                                <img class="user-image" src="images/user-icon.png" alt="Author">
                                <span class="ml-2 mr-2"><strong>By Jane Smith</strong></span>
                                <span>40</span>
                            </div>
                            <div class="mt-2 repeat-data-rangking">
                                <img class="user-image" src="images/user-icon.png" alt="Author">
                                <span class="ml-2 mr-2"><strong>By Jane Smith</strong></span>
                                <span>30h</span>
                            </div>
                            <div class="mt-2 repeat-data-rangking">
                                <img class="user-image" src="images/user-icon.png" alt="Author">
                                <span class="ml-2 mr-2"><strong>By Jane Smith</strong></span>
                                <span>60</span>
                            </div>
                            <div class="mt-2 repeat-data-rangking">
                                <img class="user-image" src="images/user-icon.png" alt="Author">
                                <span class="ml-2 mr-2"><strong>By Jane Smith</strong></span>
                                <span>80</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Customer Map & Revenue -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h6>Overview</h6>
                <canvas id="overviewChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h6>Total Revenue</h6>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="card mb-4" style="width: 100%">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 table-hover">
                        <h5 class="card-title text-start" style="margin-top: 4px; padding-left: 10px;">dadasdada</h5>
                        <thead class="bg-grey1" style="background: #f8fafc">
                            <tr>
                                <th class="text-start">No.</th>
                                <th class="text-start">Jenis Artikel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php
                        $nomor=1;
                        @endphp
                        <tbody>
                            {{-- @foreach ($card['get_data'] as $kategori) --}}
                            <tr>
                                <td>dsad</td>
                                <td>dsad</td>
                                {{-- <td class="text-center">{{ $nomor++ }}</td>
                                <td class="text-center">{{ $kategori->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ url('/backoffice/' . $kategori->id . '/editkategori') }}"
                                            class="btn btn-primary btn-sm bg-primary mr-1 text-white">Edit</a>
                                    </div>
                                </td> --}}
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>




<script>
    // Order Summary Chart
    var ctx1 = document.getElementById('orderSummaryChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Orders',
                data: [50, 80, 60, 90, 100],
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 90
                }
            }
        }
    });


    // Overview Chart
    var ctx2 = document.getElementById('overviewChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Overview',
                data: [10, 30, 20, 50, 40],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true
            }]
        }
    });

    // Customer Map (Dummy Pie Chart)
    var ctx3 = document.getElementById('customerMapChart').getContext('2d');
    new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['USA', 'UK', 'India', 'Canada'],
            datasets: [{
                label: 'Customers',
                data: [200, 150, 300, 100],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Tambahkan ini agar tinggi bisa disesuaikan
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        font: {
                            size: 14
                        },
                        padding: 20
                    }
                }
            }
        }
    });


    // Revenue Chart
    var ctx4 = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
            datasets: [{
                label: 'Revenue ($)',
                data: [12000, 15000, 13000, 18000],
                backgroundColor: 'rgba(75, 192, 192, 0.5)'
            }]
        }
    });

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
