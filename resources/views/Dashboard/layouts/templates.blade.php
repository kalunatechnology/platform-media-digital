<!DOCTYPE html>
<html lang="en">
<head>
    @include('Dashboard.components.head')
</head>
<body>
    @include('Dashboard.components.sidebar')
    @yield('content')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>