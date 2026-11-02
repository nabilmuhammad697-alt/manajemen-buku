<x-app-layout>

    @php
        $totalBooks = \App\Models\Book::count();
        $recentBooks = \App\Models\Book::latest()->take(5)->get();
        $totalUsers = \App\Models\User::count();
        $userRole = auth()->user()->getRoleNames()->first() ?? 'Pengguna';
    @endphp

    <div class="space-y-8">

        <!-- Welcome Section -->
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-950 to-blue-800 p-8 text-white shadow-xl sm:p-10">

            <div class="relative z-10 max-w-2xl">
                <p class="mb-3 text-sm font-medium tracking-wider text-blue-200">
                    DIGITAL LIBRARY MANAGEMENT SYSTEM
                </p>

                <h1 class="text-3xl font-extrabold leading-tight sm:text-4xl">
                    Selamat Datang,
                    {{ auth()->user()->name }}!
                </h1>

                <p class="mt-4 max-w-xl text-sm leading-relaxed text-blue-100 sm:text-base">
                    Kelola koleksi buku dan akses informasi perpustakaan
                    melalui satu platform digital yang praktis dan terintegrasi.
                </p>

                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    {{ $userRole }}
                </div>
            </div>

            <div class="pointer-events-none absolute -right-12 -top-20 h-72 w-72 rounded-full border-[35px] border-white/5"></div>
            <div class="pointer-events-none absolute -bottom-32 right-28 h-64 w-64 rounded-full bg-blue-400/10 blur-2xl"></div>

        </section>

        <!-- Statistics -->
        <section>
            <div class="mb-5">
                <h2 class="text-xl font-bold text-slate-800">
                    Ringkasan Perpustakaan
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi data terkini dari sistem.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <!-- Total Books -->
                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Total Koleksi Buku
                            </p>

                            <h3 class="mt-3 text-3xl font-extrabold text-slate-800">
                                {{ number_format($totalBooks) }}
                            </h3>

                            <p class="mt-2 text-xs text-slate-400">
                                Buku tersimpan dalam database
                            </p>
                        </div>

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2 2 0 0 1 2-2h16" />
                            </svg>
                        </div>
                    </div>

                    @can('books.view')
                        <a href="{{ route('books.index') }}"
                           class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800">
                            Lihat koleksi buku
                            <span>→</span>
                        </a>
                    @endcan

                </div>

                <!-- Total Users: Admin only -->
                @can('users.manage-roles')
                    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Pengguna
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold text-slate-800">
                                    {{ number_format($totalUsers) }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Pengguna terdaftar dalam sistem
                                </p>
                            </div>

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-purple-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                        d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2 M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM20 8v6m-3-3h6" />
                                </svg>
                            </div>
                        </div>

                        <a href="{{ route('users.roles.index') }}"
                           class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800">
                            Kelola pengguna
                            <span>→</span>
                        </a>

                    </div>
                @endcan

            </div>
        </section>

        <!-- Recent Books -->
        <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

            <div class="flex flex-col justify-between gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center">

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Koleksi Buku Terbaru
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Daftar buku yang terakhir ditambahkan.
                    </p>
                </div>

                @can('books.view')
                    <a href="{{ route('books.index') }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800">
                        Lihat semua buku
                        <span>→</span>
                    </a>
                @endcan

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                No.
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Judul Buku
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Penulis
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Tahun Terbit
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($recentBooks as $book)
                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4 text-sm text-slate-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-800">
                                        {{ $book->judul }}
                                    </p>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $book->penulis }}
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $book->tahun_terbit }}
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center">
                                    <p class="font-medium text-slate-500">
                                        Belum ada koleksi buku.
                                    </p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Data buku akan ditampilkan setelah ditambahkan.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </section>

        <!-- Quick Information -->
        <section class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div class="rounded-2xl border border-blue-100 bg-blue-50 p-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-bold text-slate-800">
                            Akses Perpustakaan Digital
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-slate-600">
                            Temukan dan lihat informasi koleksi buku yang tersedia
                            melalui menu Manajemen Buku.
                        </p>
                    </div>
                </div>
            </div>

            @can('users.manage-roles')
                <div class="rounded-2xl border border-purple-100 bg-purple-50 p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2 M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM20 8v6m-3-3h6" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Manajemen Pengguna
                            </h3>

                            <p class="mt-2 text-sm leading-relaxed text-slate-600">
                                Atur hak akses pengguna berdasarkan role Admin,
                                Dosen, dan Mahasiswa.
                            </p>

                            <a href="{{ route('users.roles.index') }}"
                               class="mt-3 inline-block text-sm font-semibold text-purple-700 hover:text-purple-900">
                                Kelola role pengguna →
                            </a>
                        </div>
                    </div>
                </div>
            @endcan

        </section>

    </div>

</x-app-layout>
