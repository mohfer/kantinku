<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kantinku')</title>

    <!-- Tambahkan ini -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">



    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-50 text-gray-800">
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
