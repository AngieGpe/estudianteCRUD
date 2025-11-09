<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students CRUD</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900">
    <nav class="bg-blue-600 text-white p-4">
        <a href="{{ route('students.index') }}" class="mr-4 hover:underline">Students</a>
        <a href="{{ route('careers.index') }}" class="hover:underline">Careers</a>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
