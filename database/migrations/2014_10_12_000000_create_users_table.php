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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // KONEKSI MODEL
            // $table->enum('profile', ['Mahasiswa', 'Dosen', 'Staff'])->default('Mahasiswa');
            // $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('type')->default('0');

            // PROFILE SINGKAT
            $table->string('name');
            $table->string('photo')->default('default.jpg');
            $table->string('username')->nullable()->unique();

            // DATA KONTAK
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('link_ig')->nullable();          // SOSIAL MEDIA INSTAGRAM
            $table->string('link_fb')->nullable();          // SOSIAL MEDIA FACEBOOK
            $table->string('link_in')->nullable();          // SOSIAL MEDIA LINKEDIN

            // DATA BIODATA
            $table->string('bio_blood')->nullable();        // BIODATA GOLONGAN DARAH
            $table->string('bio_height')->nullable();       // BIODATA TINGGI BADAN
            $table->string('bio_weight')->nullable();       // BIODATA BERAT BADAN
            $table->string('bio_gender')->nullable();       // BIODATA JENIS KELAMIN
            $table->string('bio_religion')->nullable();     // BIODATA AGAMA
            $table->string('bio_placebirth')->nullable();   // BIODATA TEMPAT LAHIR
            $table->string('bio_nationality')->nullable();  // BIODATA KEWARGANEGARAAN
            $table->date('bio_datebirth')->nullable();      // BIODATA TANGGAL LAHIR
            
            // DATA NOMOR IDENTITAS
            $table->string('numb_kk')->nullable();        // NOMOR IDENTITAS KARTU KELUARGA
            $table->string('numb_ktp')->nullable();       // NOMOR IDENTITAS KARTU TANDA PENDUDUK
            $table->string('numb_npsn')->nullable();      // NOMOR IDENTITAS NPSN
            $table->string('numb_nitk')->nullable();      // NOMOR IDENTITAS TENAGA KEPENDIDIKAN
            $table->string('numb_staff')->nullable();     // NOMOR IDENTITAS STAFF

            // DATA KEAMANAN
            $table->string('code')->unique();
            $table->string('password');
            $table->boolean('fst_setup')->default(false);
            $table->boolean('tfa_setup')->default(false);

            // DATA ALAMAT RUMAH BERDASARKAN KTP
            $table->text('ktp_addres')->nullable();
            $table->text('ktp_rt')->nullable();
            $table->text('ktp_rw')->nullable();
            $table->text('ktp_village')->nullable();
            $table->text('ktp_subdistrict')->nullable();
            $table->text('ktp_poscode')->nullable();
            $table->text('ktp_city')->nullable();
            $table->text('ktp_province')->nullable();

            // DATA ALAMAT RUMAH BERDASARKAN DOMISILI
            $table->enum('domicile_same', ['Yes', 'No'])->default('No');
            $table->text('domicile_addres')->nullable();
            $table->string('domicile_rt')->nullable();
            $table->string('domicile_rw')->nullable();
            $table->string('domicile_village')->nullable();
            $table->string('domicile_subdistrict')->nullable();
            $table->string('domicile_poscode')->nullable();
            $table->string('domicile_city')->nullable();
            $table->string('domicile_province')->nullable();

            // DATA PENGHUBUNG GOOGLE
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('google_refresh_token')->nullable();
            
            // DATA EDUKASI TERAKHIR
            $table->string('title_front')->nullable();
            $table->string('title_behind')->nullable();
            // DATA PENDIDIKAN PERTAMA
            $table->enum('edu1_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->default('SMA/SMK');
            $table->string('edu1_place')->nullable();
            $table->string('edu1_major')->nullable();
            $table->string('edu1_average_score')->nullable();
            $table->string('edu1_graduate_year')->nullable();
            // DATA PENDIDIKAN KEDUA
            $table->enum('edu2_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->nullable();
            $table->string('edu2_place')->nullable();
            $table->string('edu2_major')->nullable();
            $table->string('edu2_average_score')->nullable();
            $table->string('edu2_graduate_year')->nullable();
            // DATA PENDIDIKAN KETIGA
            $table->enum('edu3_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->nullable();
            $table->string('edu3_place')->nullable();
            $table->string('edu3_major')->nullable();
            $table->string('edu3_average_score')->nullable();
            $table->string('edu3_graduate_year')->nullable();

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // UNDER THIS WILL BE DELETED
            // DATA PRIBADI
            // $table->string('birth_place')->nullable();
            // $table->date('birth_date')->nullable();
            // $table->string('gend')->nullable(); // GENDER
            // $table->string('reli')->nullable(); // RELIGION
            // // DATA KONTAK DARURAT
            // $table->string('contact_name_1')->nullable();
            // $table->string('contact_name_2')->nullable();
            // $table->string('contact_phone_1')->nullable();
            // $table->string('contact_phone_2')->nullable();
            // // DATA AKUN
            // $table->string('user');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            // // VERIFIED TOKEN
            // $table->tinyInteger('status')->default(0);
            // $table->string('verify_token')->nullable();
            // $table->timestamp('token_created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
