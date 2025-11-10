<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel agar tidak terjadi duplikasi
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ambil semua data provinsi
        $provinces = DB::table('provinces')->get();

        foreach ($provinces as $prov) {
            $this->command->info("⏳ Mengambil kota/kabupaten untuk provinsi: {$prov->name} ({$prov->code})");

            try {
                // Ambil data kota/kabupaten dari API EMSIFA (kode BPS)
                $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$prov->code}.json");

                if ($response->successful() && is_array($response->json())) {
                    $cities = $response->json();

                    foreach ($cities as $city) {
                        DB::table('cities')->insert([
                            'code'        => $city['id'],
                            'name'        => $city['name'],
                            'province_id' => $prov->id,
                            'created_at'  => now(),
                            'updated_at'  => now(),
                        ]);
                    }

                    $this->command->info("✅ Berhasil menambahkan " . count($cities) . " kota/kab untuk {$prov->name}");
                } else {
                    $this->command->warn("⚠️ Gagal mengambil data kota untuk provinsi kode {$prov->code}");
                }
            } catch (\Exception $e) {
                $this->command->error("❌ Error mengambil data untuk {$prov->name}: " . $e->getMessage());
            }
        }

        // Tambahkan manual untuk provinsi baru (kode 95–98) karena tidak ada di API
        $manualPapua = [
            ['code' => '9501', 'name' => 'Kabupaten Sorong',     'province_code' => '95'],
            ['code' => '9601', 'name' => 'Kabupaten Mimika',     'province_code' => '96'],
            ['code' => '9701', 'name' => 'Kabupaten Jayawijaya', 'province_code' => '97'],
            ['code' => '9801', 'name' => 'Kabupaten Merauke',    'province_code' => '98'],
        ];

        foreach ($manualPapua as $city) {
            $province = DB::table('provinces')->where('code', $city['province_code'])->first();
            if ($province) {
                DB::table('cities')->insert([
                    'code'        => $city['code'],
                    'name'        => $city['name'],
                    'province_id' => $province->id,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
                $this->command->info("📍 Menambahkan kota manual {$city['name']} ({$city['code']})");
            }
        }

        $this->command->info("🎉 Seeder kota/kabupaten selesai!");
    }
}
