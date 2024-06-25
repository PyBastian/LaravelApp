<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
