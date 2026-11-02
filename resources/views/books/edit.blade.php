<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">

                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">

                        <div>
                            <label class="block font-medium">Judul Buku</label>
                            <input type="text" name="judul"
                                value="{{ old('judul', $book->judul) }}"
                                class="w-full border-gray-300 rounded-md" required>
                            @error('judul')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Penulis</label>
                            <input type="text" name="penulis"
                                value="{{ old('penulis', $book->penulis) }}"
                                class="w-full border-gray-300 rounded-md" required>
                            @error('penulis')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Penerbit</label>
                            <input type="text" name="penerbit"
                                value="{{ old('penerbit', $book->penerbit) }}"
                                class="w-full border-gray-300 rounded-md" required>
                            @error('penerbit')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit"
                                value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                                min="1000" max="{{ date('Y') }}"
                                class="w-full border-gray-300 rounded-md" required>
                            @error('tahun_terbit')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium">ISBN</label>
                            <input type="text" name="isbn"
                                value="{{ old('isbn', $book->isbn) }}"
                                class="w-full border-gray-300 rounded-md">
                            @error('isbn')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Deskripsi</label>
                            <textarea name="deskripsi"
                                class="w-full border-gray-300 rounded-md">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">
                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded">
                            Perbarui Buku
                        </button>

                        <a href="{{ route('books.index') }}"
                            class="bg-gray-300 px-5 py-2 rounded">
                            Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
