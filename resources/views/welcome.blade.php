<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Manually compiled CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #414141;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .btn-primary {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 10px;
            margin-bottom: 10px;
            color: #fff;
            background-color: #3490dc;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ReBits Prueba Tecnica</h1>

        <div class="navbar">
            <a href="{{ route('owners.index') }}" class="btn btn-primary">View Owners</a>
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary">View Vehicles</a>
            <a href="{{ route('owners.create') }}" class="btn btn-primary">Add Owner</a>
            <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
            <a href="{{ route('owner_histories.index') }}" class="btn btn-primary">View Vehicles Owner History</a>
            <a href="{{ route('import') }}" class="btn btn-primary">Import Data from Excell</a>
        </div>
    </div>
    
    <!-- Manually compiled JavaScript -->
    <script src="/js/app.js"></script>
</body>
</html>
