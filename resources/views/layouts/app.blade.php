<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Manually compiled CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Link to your custom CSS file -->
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content') <!-- Content section for specific views -->
    </div>

    <!-- Manually compiled JavaScript -->
    <script src="/js/app.js"></script>
</body>
</html>
