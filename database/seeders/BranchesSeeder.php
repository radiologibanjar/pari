<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan FK biar truncate aman
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('branches')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = now();

        // 1️⃣ Buat Pengurus Pusat
        $pusatId = DB::table('branches')->insertGetId([
            'name' => 'Pengurus Pusat',
            'level' => 'pusat',
            'parent_id' => null,
            'province_id' => null,
            'city_id' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Ambil semua provinsi
        $provinces = DB::table('provinces')->get();

        foreach ($provinces as $prov) {
            // 2️⃣ Buat Pengurus Daerah untuk setiap provinsi
            $provinsiId = DB::table('branches')->insertGetId([
                'name' => 'Pengurus Daerah ' . ucwords(strtolower($prov->name)),
                'level' => 'provinsi',
                'parent_id' => $pusatId,
                'province_id' => $prov->id,
                'city_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // Ambil semua kota/kabupaten dalam provinsi ini
            $cities = DB::table('cities')->where('province_id', $prov->id)->get();

            foreach ($cities as $city) {
                // 3️⃣ Buat Pengurus Cabang untuk setiap kota
                DB::table('branches')->insert([
                    'name' => 'Pengurus Cabang ' . ucwords(strtolower($city->name)),
                    'level' => 'cabang',
                    'parent_id' => $provinsiId,
                    'province_id' => $prov->id,
                    'city_id' => $city->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        $this->command->info('✅ BranchesSeeder berhasil dijalankan!');
    }
}
