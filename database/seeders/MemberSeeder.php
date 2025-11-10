<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\MemberProfile;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🔍 Mengecek user yang belum punya profil...');

        // Ambil semua user
        $users = User::all();
        $count = 0;

        foreach ($users as $user) {
            // Jika belum punya profile, buatkan
            if (!$user->profile) {
                MemberProfile::create([
                    'user_id' => $user->id,
                    'branch_id' => $user->branch_id,
                    'nir' => 'NIR' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
                    'full_name' => $user->name,
                    'status' => 'approved',
                ]);

                $count++;
                $this->command->info("✅ Profil dibuat untuk user: {$user->name}");
            }
        }

        if ($count === 0) {
            $this->command->warn('⚠️ Semua user sudah punya profil, tidak ada data baru.');
        } else {
            $this->command->info("🎉 Selesai! {$count} profil berhasil dibuat.");
        }
    }
}
