<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    @yield('library-css')

    <title>Juanda Ticket</title>
</head>
<body class="bg-blue-200">
    @include('include.navbar')

    <div class="contaner px-4">
        @yield('content')
    </div>
    

    @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
 
    @vite(['resources/js/app.js'])
    @yield('library-js')
</body>
</html>