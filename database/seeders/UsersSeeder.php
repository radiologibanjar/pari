<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Branch;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan FK constraint dulu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ✅ 1. Superadmin
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'branch_id' => null,
        ]);

        // ✅ 2. Admin Pusat
        $pusat = Branch::firstOrCreate(
            ['name' => 'Pengurus Pusat'],
            ['level' => 'pusat']
        );

        User::create([
            'name' => 'Admin Pusat',
            'email' => 'adminpusat@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin_pusat',
            'branch_id' => $pusat->id,
        ]);

        // ✅ 3. Admin Provinsi (contoh: Jawa Barat)
        $prov = Branch::where('level', 'provinsi')
            ->whereHas('province', fn($q) => $q->where('name', 'Jawa Barat'))
            ->first();

        if ($prov) {
            User::create([
                'name' => 'Admin Provinsi Jawa Barat',
                'email' => 'adminjabar@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin_provinsi',
                'branch_id' => $prov->id,
            ]);
        }

        // ✅ 4. Admin Cabang (contoh: Kota Bandung)
        $cabang = Branch::where('level', 'cabang')
            ->whereHas('city', fn($q) => $q->where('name', 'KOTA BANDUNG'))
            ->first();

        if ($cabang) {
            User::create([
                'name' => 'Admin Cabang Bandung',
                'email' => 'adminbandung@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin_cabang',
                'branch_id' => $cabang->id,
            ]);
        }

        $this->command->info('✅ UsersSeeder selesai. Akun login siap digunakan!');
    }
}
