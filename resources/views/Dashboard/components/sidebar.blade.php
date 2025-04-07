<div id="sidebar" class="sidebar expanded">
    <div class="divider-navbar">
        <hr>
    </div>
    <div class="d-flex align-items-center">
        <img class="logo" style="margin-left: 10px;" src="{{ URL::asset('images/sidebar_dashboard.png') }}"
            alt="logo perusahan">
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
            <a href="{{ url('/backoffice') }}"><i class="fas fa-home"></i> <span class="menu-text">Home</span></a>
        </li>
        @if(Session::get('roles') == 'Developer')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-file"></i> <span class="menu-text">Content Management </span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/kategori') }}">
                    <i class="fa-solid fa-list"></i> <span class="menu-text">Categories</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/artikeladmin') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/artikel') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/artikeleditor') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/pilihan_editor_admin') }}">
                    <i class="fa-solid fa-file-signature"></i> <span class="menu-text">Pilihan Editor<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/pilihan_editor') }}">
                    <i class="fa-solid fa-file-signature"></i> <span class="menu-text">Pilihan Editor<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/banner_article_admin') }}">
                    <i class="fas fa-desktop"></i> <span class="menu-text">Banner Home<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/banner_article_editor') }}">
                    <i class="fas fa-desktop"></i> <span class="menu-text">Banner Home<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/trending_article') }}">
                    <i class="fa-solid fa-chart-line"></i> <span class="menu-text">Trending Article</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/table') }}">
                    <i class="fa-solid fa-comments"></i> <span class="menu-text">Comments</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-eye"></i> <span class="menu-text">Article Views</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-chart-simple"></i> <span class="menu-text">Analytics</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice') }}"><i class="fa-brands fa-adversal"></i> <span class="menu-text">Ads
                    Management</span></a>
        </li>
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-cog"></i> <span class="menu-text">System Management</span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/role') }}">
                    <i class="fas fa-user-cog"></i> <span class="menu-text">Roles Management</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/usersetting') }}">
                    <i class="fa-solid fa-user"></i> <span class="menu-text">Users Management</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice/profile/' . Auth::user()->id) }}"><i class="fa-solid fa-user"></i> <span class="menu-text">Profile</span></a>
        </li>
        @endif
        @if(Session::get('roles') == 'Editor')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-file"></i> <span class="menu-text">Content Management </span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/kategori') }}">
                    <i class="fa-solid fa-list"></i> <span class="menu-text">Categories</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/artikeleditor') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/pilihan_editor') }}">
                    <i class="fa-solid fa-file-signature"></i> <span class="menu-text">Pilihan Editor<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/banner_article_editor') }}">
                    <i class="fas fa-desktop"></i> <span class="menu-text">Banner Home<small>(editor)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/trending_article') }}">
                    <i class="fa-solid fa-chart-line"></i> <span class="menu-text">Trending Article</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/table') }}">
                    <i class="fa-solid fa-comments"></i> <span class="menu-text">Comments</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-eye"></i> <span class="menu-text">Article Views</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice/profile/' . Auth::user()->id) }}"><i class="fa-solid fa-user"></i> <span class="menu-text">Profile</span></a>
        </li>
        @endif
        @if(Session::get('roles') == 'Admin')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-file"></i> <span class="menu-text">Content Management </span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/kategori') }}">
                    <i class="fa-solid fa-list"></i> <span class="menu-text">Categories</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/artikeladmin') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/banner_article_admin') }}">
                    <i class="fas fa-desktop"></i> <span class="menu-text">Banner Home<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/pilihan_editor_admin') }}">
                    <i class="fa-solid fa-file-signature"></i> <span class="menu-text">Pilihan Editor<small>(admin)</small></span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/trending_article') }}">
                    <i class="fa-solid fa-chart-line"></i> <span class="menu-text">Trending Article</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/table') }}">
                    <i class="fa-solid fa-comments"></i> <span class="menu-text">Comments</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-eye"></i> <span class="menu-text">Article Views</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-chart-simple"></i> <span class="menu-text">Analytics</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice') }}"><i class="fa-brands fa-adversal"></i> <span class="menu-text">Ads
                    Management</span></a>
        </li>
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-cog"></i> <span class="menu-text">System Management</span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/usersetting') }}">
                    <i class="fa-solid fa-user"></i> <span class="menu-text">Users Management</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice/profile/' . Auth::user()->id) }}"><i class="fa-solid fa-user"></i> <span class="menu-text">Profile</span></a>
        </li>
        @endif
        @if(Session::get('roles') == 'Author')
        <li class="menu-item dropdownku">
            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-file"></i> <span class="menu-text">Content Management </span>
                <i class="fas fa-angle-down arrow"></i>
            </a>
            <ul class="dropdownmenuku" aria-labelledby="DropdownMenuLink">
                <a class="nav-link baru" href="{{ url('/backoffice/artikel') }}">
                    <i class="fa-solid fa-newspaper"></i> <span class="menu-text">Articles</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/table') }}">
                    <i class="fa-solid fa-comments"></i> <span class="menu-text">Comments</span>
                </a>
                <a class="nav-link baru" href="{{ url('/backoffice/sikappolitik') }}">
                    <i class="fa-solid fa-eye"></i> <span class="menu-text">Article Views</span>
                </a>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('/backoffice/profile/' . Auth::user()->id) }}"><i class="fa-solid fa-user"></i> <span class="menu-text">Profile</span></a>
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
