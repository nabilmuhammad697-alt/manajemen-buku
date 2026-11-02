<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library Hub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100 text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen">

        <!-- Mobile Overlay -->
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden"
            style="display: none;">
        </div>

        <!-- Sidebar -->
        <aside
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col bg-slate-950 text-white transition-transform duration-300 lg:translate-x-0">

            <!-- Logo -->
            <div class="flex h-20 items-center gap-3 border-b border-white/10 px-7">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 shadow-lg shadow-blue-600/30">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                            d="M4 19V5l7-2 7 2v14l-7 2-7-2Z M11 3v18 M18 5l3-1v14l-3 1" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-lg font-extrabold tracking-wide">LIBRARY HUB</h1>
                    <p class="text-xs text-slate-400">Digital Library System</p>
                </div>

                <button
                    @click="sidebarOpen = false"
                    class="ml-auto text-slate-400 hover:text-white lg:hidden">
                    ✕
                </button>
            </div>

            <!-- Navigation -->
            <div class="flex-1 overflow-y-auto px-5 py-7">

                <p class="mb-4 px-3 text-xs font-bold uppercase tracking-widest text-slate-500">
                    Main Menu
                </p>

                <nav class="space-y-2">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                       {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V10Z" />
                        </svg>

                        Dashboard
                    </a>

                    <!-- Manajemen Buku -->
                    @can('books.view')
                        <a href="{{ route('books.index') }}"
                           class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                           {{ request()->routeIs('books.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2 2 0 0 1 2-2h14" />
                            </svg>

                            Manajemen Buku
                        </a>
                    @endcan

                    <!-- Pengelolaan Role -->
                    @can('users.manage-roles')
                        <a href="{{ route('users.roles.index') }}"
                           class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                           {{ request()->routeIs('users.roles.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2 M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM20 8v6m-3-3h6" />
                            </svg>

                            Pengelolaan Role
                        </a>
                    @endcan

                </nav>

                <!-- Information -->
                <div class="mt-10 rounded-2xl border border-white/10 bg-white/5 p-4">
                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span class="text-xs font-semibold text-emerald-400">System Active</span>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        Sistem Manajemen Buku berjalan dengan Laravel dan Spatie Permission.
                    </p>
                </div>

            </div>

            <!-- Sidebar Footer -->
            <div class="border-t border-white/10 p-5">
                <p class="text-xs text-slate-500">
                    © {{ date('Y') }} Library Hub
                </p>
                <p class="mt-1 text-xs text-slate-600">
                    Digital Library Management
                </p>
            </div>

        </aside>

        <!-- Main Content -->
        <div class="min-h-screen lg:ml-72">

            <!-- Top Header -->
            <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white/90 px-5 backdrop-blur-md sm:px-8">

                <div class="flex items-center gap-4">

                    <!-- Mobile Menu Button -->
                    <button
                        @click="sidebarOpen = true"
                        class="rounded-xl border border-slate-200 p-2 text-slate-600 hover:bg-slate-100 lg:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <div>
                        <p class="text-xs font-medium text-slate-400">
                            LIBRARY HUB / MANAGEMENT
                        </p>

                        <h2 class="mt-1 text-lg font-bold text-slate-800">
                            @isset($header)
                                {{ $header }}
                            @else
                                Dashboard
                            @endisset
                        </h2>
                    </div>

                </div>

                <!-- User Profile Dropdown -->
                <div x-data="{ userMenuOpen: false }" class="relative">

                    <button
                        @click="userMenuOpen = !userMenuOpen"
                        @click.outside="userMenuOpen = false"
                        class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2 transition hover:bg-slate-50">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-100 font-bold text-blue-700">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="hidden text-left sm:block">
                            <p class="text-sm font-bold text-slate-800">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-slate-500">
                                {{ auth()->user()->getRoleNames()->first() ?? 'Pengguna' }}
                            </p>
                        </div>

                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m6 9 6 6 6-6" />
                        </svg>

                    </button>

                    <div
                        x-show="userMenuOpen"
                        x-transition
                        @click.outside="userMenuOpen = false"
                        class="absolute right-0 mt-3 w-56 rounded-2xl border border-slate-100 bg-white p-2 shadow-xl"
                        style="display: none;">

                        <div class="border-b border-slate-100 px-3 py-3">
                            <p class="text-sm font-bold text-slate-800">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="mt-1 text-xs text-slate-500">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="block rounded-xl px-3 py-2.5 text-sm text-slate-600 hover:bg-slate-100">
                            Pengaturan Profil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="w-full rounded-xl px-3 py-2.5 text-left text-sm font-medium text-red-600 hover:bg-red-50">
                                Keluar dari Aplikasi
                            </button>
                        </form>

                    </div>

                </div>

            </header>

            <!-- Page Content -->
            <main class="min-h-[calc(100vh-5rem)] px-5 py-8 sm:px-8">

                @isset($header)
                    <div class="mb-7">
                        {{ $header }}
                    </div>
                @endisset

                {{ $slot }}

            </main>

        </div>

    </div>

</body>
</html>
