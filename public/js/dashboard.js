document.getElementById('sidebarToggle').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    var content = document.querySelector('.ml-sidebar');
    sidebar.classList.toggle('collapsed');
    sidebar.classList.toggle('expanded');
    content.classList.toggle('collapsed');
    document.querySelector('.logo-text').classList.toggle('d-none');
});

document.querySelectorAll('.nav-item.dropdownku .dropdown-toggle').forEach(function(element) {
    element.addEventListener('click', function(e) {
        e.preventDefault();
        var parent = this.parentElement;
        parent.classList.toggle('active');
    });
});
