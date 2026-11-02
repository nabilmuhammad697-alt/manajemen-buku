<x-app-layout>
    @php
        $totalUsers = $users->total();

        $adminCount = \App\Models\User::role('Admin')->count();
        $dosenCount = \App\Models\User::role('Dosen')->count();
        $mahasiswaCount = \App\Models\User::role('Mahasiswa')->count();
    @endphp

    <div class="space-y-6">

        {{-- Header halaman --}}
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                <span>/</span>
                <span class="text-blue-600 font-medium">Pengelolaan Role</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">Pengelolaan Role Pengguna</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola pengguna dan atur hak akses berdasarkan peran masing-masing.
            </p>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if (session('error'))
            <div class="flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
        @endif

        {{-- Ringkasan pengguna --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Pengguna</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalUsers }}
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M17 20h5v-2a4 4 0 00-5.5-3.72M9 20H2v-2a4 4 0 017-2.65M15 20v-2a6 6 0 00-12 0v2m12-10a4 4 0 11-8 0 4 4 0 018 0zm6-3a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Seluruh akun terdaftar</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Admin</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $adminCount }}
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 15l-2 2 2 2 2-2-2-2zm0-13l7 4v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-4z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Pengelola sistem</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Dosen</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $dosenCount }}
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42A12 12 0 0118 16v2H6v-2a12 12 0 01.84-5.42L12 14z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Pengguna dengan role Dosen</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Mahasiswa</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $mahasiswaCount }}
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0v7m-5-3h10"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Pengguna dengan role Mahasiswa</p>
            </div>

        </div>

        {{-- Tabel pengguna --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h2 class="font-bold text-gray-800">Daftar Pengguna</h2>
                    <p class="text-xs text-gray-500 mt-1">
                        Atur role untuk menentukan hak akses setiap pengguna.
                    </p>
                </div>

                <div class="inline-flex items-center gap-2 text-xs text-gray-500 bg-gray-50 border border-gray-100 rounded-lg px-3 py-2">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Manajemen akses aktif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead>
                        <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                            <th class="px-6 py-4 font-semibold">No.</th>
                            <th class="px-6 py-4 font-semibold">Pengguna</th>
                            <th class="px-6 py-4 font-semibold">Role Saat Ini</th>
                            <th class="px-6 py-4 font-semibold">Ubah Role</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50/70 transition">

                                {{-- Nomor --}}
                                <td class="px-6 py-5 text-sm text-gray-500">
                                    {{ $users->firstItem() + $loop->index }}
                                </td>

                                {{-- Identitas pengguna --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">
                                                {{ $user->name }}
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1 break-all">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Role saat ini --}}
                                <td class="px-6 py-5">
                                    <div class="flex flex-wrap gap-2">
                                        @forelse ($user->roles as $role)
                                            @php
                                                $roleColor = match ($role->name) {
                                                    'Admin' => 'bg-purple-50 text-purple-700 border-purple-100',
                                                    'Dosen' => 'bg-amber-50 text-amber-700 border-amber-100',
                                                    'Mahasiswa' => 'bg-green-50 text-green-700 border-green-100',
                                                    default => 'bg-gray-100 text-gray-600 border-gray-200',
                                                };
                                            @endphp

                                            <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-semibold {{ $roleColor }}">
                                                {{ $role->name }}
                                            </span>
                                        @empty
                                            <span class="text-xs text-gray-400 italic">
                                                Belum memiliki role
                                            </span>
                                        @endforelse
                                    </div>
                                </td>

                                {{-- Form ubah role --}}
                                <td class="px-6 py-5">
                                    <form action="{{ route('users.roles.update', $user) }}"
                                          method="POST"
                                          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                                        @csrf
                                        @method('PUT')

                                        <select name="role"
                                                class="min-w-36 rounded-xl border-gray-200 bg-gray-50 text-xs focus:border-blue-500 focus:ring-blue-500"
                                                required>
                                            <option value="">Pilih Role</option>

                                            <option value="Admin" @selected($user->hasRole('Admin'))>
                                                Admin
                                            </option>

                                            <option value="Dosen" @selected($user->hasRole('Dosen'))>
                                                Dosen
                                            </option>

                                            <option value="Mahasiswa" @selected($user->hasRole('Mahasiswa'))>
                                                Mahasiswa
                                            </option>
                                        </select>

                                        <button type="submit"
                                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700 transition shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Simpan
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="text-gray-400">
                                        <svg class="w-10 h-10 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M17 20h5v-2a4 4 0 00-5.5-3.72M9 20H2v-2a4 4 0 017-2.65M15 20v-2a6 6 0 00-12 0v2m12-10a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        <p class="text-sm font-medium">Belum ada pengguna.</p>
                                        <p class="text-xs mt-1">Data pengguna akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($users->hasPages())
                <div class="px-6 py-5 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
            @endif

        </div>

        {{-- Informasi role --}}
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 110-20 10 10 0 010 20z"/>
                </svg>

                <div>
                    <h3 class="text-sm font-bold text-blue-800">Informasi Hak Akses</h3>
                    <p class="text-xs text-blue-700 mt-1 leading-relaxed">
                        Admin memiliki akses penuh untuk mengelola buku dan role pengguna.
                        Dosen dapat melihat, menambahkan, dan mengedit buku.
                        Mahasiswa hanya dapat melihat daftar buku.
                    </p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
