<div id="sidebar" class="sidebar expanded">
    <div class="divider-navbar">
        <hr>
    </div>
    <div class="d-flex align-items-center">
        <img class="logo" style="margin-left: 10px;" src="{{ URL::asset('images/sidebar_dashboard.png') }}" alt="logo perusahan">
        <div class="burger">
            <button id="sidebarToggle" class="navbar-toggler" type="button">
                <i class="fas fa-bars" style="color: #000000;"></i>
            </button>
        </div>
    </div>
    <div class="divider-navbar2">
        <hr>
    </div>
    <ul class="list-unstyled">
        <li class="menu-item">
            <a  href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> <span class="menu-text">Home</span></a>
        </li>
        @if(Session::get('roles') == 'superadmin')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Artikel</span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/dashboard/kategori') }}">
                    <i class="fa-solid fa-list"></i> <span class="menu-text">Kategori</span>
                </a>
                <a class="nav-link baru" href="{{ url('/dashboard/artikel') }}">
                    <i class="fa-solid fa-pen-to-square"></i> <span class="menu-text">Tulis Artikel</span>
                </a>
                <a class="nav-link baru" href="{{ url('/dashboard/pilihan_editor') }}">
                    <i class="fa-solid fa-user-pen"></i> <span class="menu-text">Pilihan Editor</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/dashboard/kontak') }}"><i class="fa-solid fa-address-book"></i> <span class="menu-text">Pesan Masuk</span></a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/dashboard/unitusaha') }}"><i class="fa-regular fa-building"></i> <span class="menu-text">Unit Usaha</span></a>
        </li>
        @endif
        @if(Session::get('roles') == 'developer')
        <li class="menu-item">
            <a href="{{ url('/dashboard/usersetting') }}"><i class="fas fa-user-cog"></i><span class="menu-text">User Setting</span> </a>
        </li>
        @endif
        @if(Session::get('roles') == 'developer')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-cog"></i> <span class="menu-text">Menu dropdown</span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/dashboard/table') }}">
                    <i class="fas fa-user-cog"></i> <span class="menu-text">Table Template</span>
                </a>
                <a class="nav-link baru" href="{{ url('/dashboard/sikappolitik') }}">
                    <i class="fa-solid fa-list"></i> <span class="menu-text">Menu 2</span>
                </a>
            </ul>
        </li>
        @endif

        <li class="menu-item">
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="menu-text">&nbsp&nbspLogout</span>
                </button>
            </form>
        </li>
        
        
        
    </ul>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var dropdowns = document.querySelectorAll('.menu-item.dropdownku');

        dropdowns.forEach(function (dropdown) {
            var dropdownToggle = dropdown.querySelector('.dropdown-toggle');
            var dropdownMenu = dropdown.querySelector('.dropdownmenuku');
            var dropdownArrow = dropdownToggle.querySelector('.arrow'); // tambahkan ini untuk panah

            dropdownMenu.style.display = "none";

            dropdownToggle.addEventListener('click', function (event) {
                event.preventDefault();
                dropdown.classList.toggle('active');

                if (dropdownMenu.style.display === "block") {
                    dropdownMenu.style.display = "none";
                    dropdownArrow.style.transform =
                        "rotate(0deg)"; // ubah rotasi panah menjadi 0 derajat
                } else {
                    dropdownMenu.style.display = "block";
                    dropdownArrow.style.transform =
                        "rotate(180deg)"; // ubah rotasi panah menjadi 180 derajat
                }
            });

            document.addEventListener('click', function (event) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('active');
                    dropdownMenu.style.display = "none";
                    dropdownArrow.style.transform =
                        "rotate(0deg)"; // pastikan panah kembali ke posisi awal saat menutup dropdown
                }
            });
        });
    });
</script>