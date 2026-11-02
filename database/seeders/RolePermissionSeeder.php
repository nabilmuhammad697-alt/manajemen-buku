<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Membersihkan cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Membuat daftar permission
        $permissions = [
            'books.view',
            'books.create',
            'books.edit',
            'books.delete',
            'users.manage-roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Membuat role
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $dosen = Role::firstOrCreate([
            'name' => 'Dosen',
            'guard_name' => 'web',
        ]);

        $mahasiswa = Role::firstOrCreate([
            'name' => 'Mahasiswa',
            'guard_name' => 'web',
        ]);

        // Mengatur permission Admin
        $admin->syncPermissions($permissions);

        // Mengatur permission Dosen
        $dosen->syncPermissions([
            'books.view',
            'books.create',
            'books.edit',
        ]);

        // Mengatur permission Mahasiswa
        $mahasiswa->syncPermissions([
            'books.view',
        ]);

        // Membersihkan cache kembali
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
