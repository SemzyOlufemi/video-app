<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoTestLaravel</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

    <nav class="bg-gray-800 px-6 py-4 flex gap-6 items-center">
        <a href="/" class="text-purple-400 font-bold text-xl">🎬 VideoTestLaravel</a>
        <a href="/videos" class="hover:text-purple-300">All Videos</a>
        <a href="/upload" class="hover:text-purple-300">Upload</a>
        <a href="/categories" class="hover:text-purple-300">Categories</a>
    </nav>

    <main class="p-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>