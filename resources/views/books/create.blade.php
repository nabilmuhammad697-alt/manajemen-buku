<x-app-layout>
    <div class="space-y-6">

        {{-- Header halaman --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('books.index') }}" class="hover:text-blue-600">Manajemen Buku</a>
                    <span>/</span>
                    <span class="text-blue-600 font-medium">Tambah Buku</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">Tambah Buku Baru</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Lengkapi informasi buku untuk menambahkannya ke koleksi perpustakaan.
                </p>
            </div>

            <a href="{{ route('books.index') }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        {{-- Form card --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Card heading --}}
            <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 6v12m6-6H6"/>
                    </svg>
                </div>

                <div>
                    <h2 class="font-bold text-gray-800">Informasi Buku</h2>
                    <p class="text-xs text-gray-500 mt-1">
                        Isi seluruh informasi yang diperlukan.
                    </p>
                </div>
            </div>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="p-6 space-y-6">

                    {{-- Informasi utama --}}
                    <div>
                        <h3 class="text-sm font-bold text-gray-800 mb-4">
                            Informasi Utama
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- Judul --}}
                            <div class="md:col-span-2">
                                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Judul Buku <span class="text-red-500">*</span>
                                </label>
                                <input id="judul" type="text" name="judul"
                                       value="{{ old('judul') }}"
                                       placeholder="Masukkan judul buku"
                                       class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm"
                                       required>
                                @error('judul')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Penulis --}}
                            <div>
                                <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Penulis <span class="text-red-500">*</span>
                                </label>
                                <input id="penulis" type="text" name="penulis"
                                       value="{{ old('penulis') }}"
                                       placeholder="Nama penulis"
                                       class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm"
                                       required>
                                @error('penulis')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Penerbit --}}
                            <div>
                                <label for="penerbit" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Penerbit <span class="text-red-500">*</span>
                                </label>
                                <input id="penerbit" type="text" name="penerbit"
                                       value="{{ old('penerbit') }}"
                                       placeholder="Nama penerbit"
                                       class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm"
                                       required>
                                @error('penerbit')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tahun terbit --}}
                            <div>
                                <label for="tahun_terbit" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tahun Terbit <span class="text-red-500">*</span>
                                </label>
                                <input id="tahun_terbit" type="number" name="tahun_terbit"
                                       value="{{ old('tahun_terbit') }}"
                                       min="1000" max="{{ date('Y') }}"
                                       placeholder="Contoh: {{ date('Y') }}"
                                       class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm"
                                       required>
                                @error('tahun_terbit')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- ISBN --}}
                            <div>
                                <label for="isbn" class="block text-sm font-semibold text-gray-700 mb-2">
                                    ISBN <span class="text-gray-400 font-normal">(Opsional)</span>
                                </label>
                                <input id="isbn" type="text" name="isbn"
                                       value="{{ old('isbn') }}"
                                       placeholder="Masukkan nomor ISBN"
                                       class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm">
                                @error('isbn')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="pt-5 border-t border-gray-100">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi Buku
                            <span class="text-gray-400 font-normal">(Opsional)</span>
                        </label>

                        <textarea id="deskripsi" name="deskripsi" rows="5"
                                  placeholder="Tuliskan ringkasan atau deskripsi buku..."
                                  class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <p class="text-xs text-gray-500">
                        <span class="text-red-500">*</span> Wajib diisi.
                    </p>

                </div>

                {{-- Tombol aksi --}}
                <div class="px-6 py-5 bg-gray-50 border-t border-gray-100 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <a href="{{ route('books.index') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl border border-gray-200 bg-white text-gray-600 text-sm font-semibold hover:bg-gray-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>

        <div class="flex items-start gap-3 p-4 rounded-xl bg-blue-50 border border-blue-100">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 110-20 10 10 0 010 20z"/>
            </svg>
            <p class="text-xs text-blue-700 leading-relaxed">
                Pastikan informasi buku sudah benar sebelum menekan tombol Simpan Buku.
                Data yang berhasil disimpan akan muncul pada halaman Manajemen Buku.
            </p>
        </div>

    </div>
</x-app-layout>
