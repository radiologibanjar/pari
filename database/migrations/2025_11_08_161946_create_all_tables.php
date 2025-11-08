<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique(); // kode BPS, misal: 32
            $table->string('name'); // contoh: Jawa Barat
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique(); // kode BPS kota/kab
            $table->string('name'); // contoh: Kota Bandung
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['pusat', 'provinsi', 'cabang']);
            $table->foreignId('parent_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('role', [
                'superadmin',
                'admin_pusat',
                'admin_provinsi',
                'admin_cabang',
                'member'
            ])->default('member');

            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('member_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();

            // Identitas utama
            $table->string('nir')->unique(); // Nomor Induk Radiografer (pengganti NIK)
            $table->string('str_number')->nullable(); // Surat Tanda Radiografer
            $table->string('sip_number')->nullable(); // Nomor Surat Izin Praktik

            // Informasi pribadi
            $table->string('full_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();

            // Kontak dan alamat
            $table->string('phone')->nullable();
            $table->string('email')->nullable(); // jika perlu email pribadi selain login user
            $table->string('address')->nullable();
            $table->string('postal_code', 10)->nullable();

            // Pendidikan & pekerjaan
            $table->string('education')->nullable();
            $table->string('institution')->nullable(); // tempat kerja / rumah sakit

            // Status keanggotaan
            $table->enum('membership_type', ['biasa', 'luar_biasa', 'kehormatan'])->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Dokumen & media
            $table->string('photo')->nullable();
            $table->string('document_path')->nullable(); // untuk upload dokumen pendukung

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_profiles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('branches');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('provinces');
    }
};
