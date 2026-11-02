<x-app-layout>

    @php
        $totalBooks = \App\Models\Book::count();
        $totalPublishers = \App\Models\Book::distinct('penerbit')->count('penerbit');
        $latestYear = \App\Models\Book::max('tahun_terbit');
    @endphp

    <div class="space-y-7">

        <!-- Page Heading -->
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-blue-600">
                    Library Collection
                </p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">
                    Manajemen Buku
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Kelola dan pantau seluruh koleksi buku dalam perpustakaan digital.
                </p>
            </div>

            @can('books.create')
                <a href="{{ route('books.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:bg-blue-700">
                    <span class="text-lg">+</span>
                    Tambah Buku
                </a>
            @endcan
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100">✓</span>
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistics -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Koleksi Buku</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                            {{ number_format($totalBooks) }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-400">Buku terdaftar dalam sistem</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-2xl">
                        📚
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Penerbit</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                            {{ number_format($totalPublishers) }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-400">Penerbit berbeda</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-2xl">
                        🏢
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Tahun Terbit Terbaru</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                            {{ $latestYear ?? '-' }}
                        </h3>
                        <p class="mt-2 text-xs text-slate-400">Berdasarkan koleksi buku</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-2xl">
                        📖
                    </div>
                </div>
            </div>

        </div>

        <!-- Book Table -->
        <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 p-6 sm:flex-row sm:items-center">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Daftar Koleksi Buku</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Informasi buku yang tersimpan dalam database.
                    </p>
                </div>

                <div class="relative w-full sm:max-w-xs">
                    <input
                        type="text"
                        id="bookSearch"
                        placeholder="Cari judul, penulis, penerbit..."
                        class="w-full rounded-xl border border-slate-200 py-2.5 pl-10 pr-4 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <svg class="absolute left-3 top-3 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="2"/>
                        <path d="m16 16 4 4" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left" id="booksTable">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">No.</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Informasi Buku</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Penerbit</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Tahun Terbit</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($books as $book)
                            <tr class="book-row transition hover:bg-slate-50">

                                <td class="px-6 py-5 text-sm text-slate-400">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-xl">
                                            📘
                                        </div>

                                        <div>
                                            <p class="font-bold text-slate-800">
                                                {{ $book->judul }}
                                            </p>
                                            <p class="mt-1 text-xs text-slate-500">
                                                {{ $book->penulis }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-5 text-sm text-slate-600">
                                    {{ $book->penerbit }}
                                </td>

                                <td class="px-6 py-5">
                                    <span class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                                        {{ $book->tahun_terbit }}
                                    </span>
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-2">

                                        @can('books.edit')
                                            <a href="{{ route('books.edit', $book) }}"
                                               class="rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('books.delete')
                                            <form action="{{ route('books.destroy', $book) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endcan

                                        @cannot('books.edit')
                                            @cannot('books.delete')
                                                <span class="text-xs text-slate-400">Lihat saja</span>
                                            @endcannot
                                        @endcannot

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="text-4xl">📚</div>
                                    <p class="mt-3 font-semibold text-slate-600">
                                        Belum ada koleksi buku
                                    </p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Data buku akan ditampilkan setelah ditambahkan.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                        <tr id="noSearchResult" class="hidden">
                            <td colspan="5" class="px-6 py-8 text-center text-sm text-slate-500">
                                Buku yang dicari tidak ditemukan.
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

            <div class="border-t border-slate-100 p-5">
                <p class="text-xs text-slate-400">
                    Menampilkan {{ $books->count() }} buku pada halaman ini.
                </p>
            </div>

        </div>

    </div>

    <!-- Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('bookSearch');
            const rows = document.querySelectorAll('.book-row');
            const noResult = document.getElementById('noSearchResult');

            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase();
                let visibleCount = 0;

                rows.forEach(function (row) {
                    const match = row.textContent.toLowerCase().includes(keyword);

                    row.style.display = match ? '' : 'none';

                    if (match) visibleCount++;
                });

                noResult.classList.toggle('hidden', visibleCount > 0);
            });
        });
    </script>

</x-app-layout>
