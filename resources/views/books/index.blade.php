<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-lg font-bold">Daftar Buku</h3>

                    @can('books.create')
                        <a href="{{ route('books.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            + Tambah Buku
                        </a>
                    @endcan
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border p-3">No</th>
                                <th class="border p-3">Judul</th>
                                <th class="border p-3">Penulis</th>
                                <th class="border p-3">Penerbit</th>
                                <th class="border p-3">Tahun</th>
                                <th class="border p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="border p-3 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $book->judul }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $book->penulis }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $book->penerbit }}
                                    </td>

                                    <td class="border p-3 text-center">
                                        {{ $book->tahun_terbit }}
                                    </td>

                                    <td class="border p-3">
                                        <div class="flex gap-2 justify-center">

                                            @can('books.edit')
                                                <a href="{{ route('books.edit', $book) }}"
                                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
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
                                                            class="bg-red-600 text-white px-3 py-1 rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border p-5 text-center text-gray-500">
                                        Belum ada data buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
