@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <title>@yield("win-title")</title>
</head>

<body>
    @include("partials.header")
    <main class="board-main">
        @yield("page-main")
    </main>

</body>

</html>