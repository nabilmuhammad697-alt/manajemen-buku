<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Menampilkan daftar pengguna dan role.
     */
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);

        return view('users.roles.index', compact('users'));
    }

    /**
     * Memperbarui role pengguna.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'exists:roles,name'],
        ]);

        // Mencegah Admin menghapus role Admin miliknya sendiri.
        if ($user->id === auth()->id() && $request->role !== 'Admin') {
            return back()->with('error', 'Anda tidak dapat menghapus role Admin milik sendiri.');
        }

        $user->syncRoles([$request->role]);

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
