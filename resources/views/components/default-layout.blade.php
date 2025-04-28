@props(['title', 'section_title' => 'Menu'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }}</title>
</head>
<body class="bg-green-50 flex min-h-screen">

    <!-- Sidebar -->
    <aside x-data="{ open: true }" class="bg-green-600 text-white w-64 space-y-6 py-7 px-4 hidden sm:block">
        <h2 class="text-2xl font-bold text-center mb-6">Sipaling</h2>

        <nav>
            <ul class="space-y-2">
            <li>
    <a href="{{ route('home') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-green-700 {{ request()->is('home') ? 'bg-green-700 font-semibold' : '' }}">
        <i class="ph-info text-xl"></i> Home
    </a>
</li>
                <li>
                    <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-green-700 {{ request()->is('laporan') ? 'bg-green-700 font-semibold' : '' }}">
                        <i class="ph-books text-xl"></i> Laporan
                    </a>
                </li>
                <li>
                    <a href="{{ route('petugas.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-green-700 {{ request()->is('petugas') ? 'bg-green-700 font-semibold' : '' }}">
                        <i class="ph-books text-xl"></i> Petugas
                    </a>
                </li>
                <li>
                    <a href="{{ route('penanganan.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-green-700 {{ request()->is('penanganan') ? 'bg-green-700 font-semibold' : '' }}">
                        <i class="ph-books text-xl"></i> Penanganan
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-green-500 text-white px-6 py-4 flex items-center justify-between sticky top-0 shadow-md">
            <h1 class="text-xl font-bold">{{ $section_title }}</h1>
            <!-- Mobile menu button -->
            <div class="sm:hidden">
                <button x-on:click="open = !open" class="focus:outline-none">
                    <i class="ph-list text-2xl"></i>
                </button>
            </div>
        </header>

        <!-- Mobile sidebar -->
        <div x-show="open" class="sm:hidden bg-green-600 text-white w-64 absolute top-16 left-0 h-full z-50 p-6">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="block py-2 hover:bg-green-700 rounded">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.index') }}" class="block py-2 hover:bg-green-700 rounded">Laporan</a>
                    </li>
                    <li>
                        <a href="{{ route('petugas.index') }}" class="block py-2 hover:bg-green-700 rounded">Petugas</a>
                    </li>
                    <li>
                        <a href="{{ route('penanganan.index') }}" class="block py-2 hover:bg-green-700 rounded">Penanganan</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
