<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProvinceCitySeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kamu punya file JSON dengan data provinsi + kota/kab
        $data = json_decode(File::get(database_path('seeders/data/indonesia_wilayah.json')), true);

        foreach ($data['provinces'] as $prov) {
            $provinceId = DB::table('provinces')->insertGetId([
                'code' => $prov['code'],
                'name' => $prov['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($prov['cities'] as $city) {
                DB::table('cities')->insert([
                    'code' => $city['code'],
                    'name' => $city['name'],
                    'province_id' => $provinceId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
