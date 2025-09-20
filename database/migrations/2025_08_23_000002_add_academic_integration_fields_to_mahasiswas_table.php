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
        Schema::table('mahasiswas', function (Blueprint $table) {
            // Neo Feeder integration fields
            $table->string('neo_feeder_id')->after('numb_nim')->nullable()->unique();
            $table->timestamp('neo_feeder_synced_at')->after('neo_feeder_id')->nullable();
            
            // Academic status management
            $table->tinyInteger('status')->default(0);
            $table->string('status_reason')->after('status')->nullable();
            $table->timestamp('status_changed_at')->after('status_reason')->nullable();
            
            // Enhanced personal data for Neo Feeder
            // $table->string('numb_nisn')->after('numb_ktp')->nullable(); // NISN
            $table->string('numb_npwp')->after('numb_nisn')->nullable(); // NPWP
            $table->string('kewarganegaraan')->after('numb_npwp')->default('ID'); // Citizenship
            
            // Guardian information
            $table->string('par_mother_income');
            $table->string('par_guardian_name')->after('par_mother_income')->nullable();
            $table->string('par_guardian_job')->after('par_guardian_name')->nullable();
            $table->integer('par_guardian_income')->after('par_guardian_job')->nullable();
            
            // Academic tracking
            $table->integer('total_sks')->after('semester')->default(0);
            $table->decimal('ipk', 3, 2)->after('total_sks')->default(0.00);
            $table->decimal('ips', 3, 2)->after('ipk')->default(0.00);
            
            // Additional contact information
            $table->string('handphone')->after('phone')->nullable();
            $table->string('telepon_rumah')->after('handphone')->nullable();
            
            // School information enhancement
            // $table->string('sch_type')->after('sch_major')->nullable(); // SMA/SMK/MA
            // $table->string('sch_province')->after('sch_type')->nullable();
            // $table->string('sch_city')->after('sch_province')->nullable();
            
            // Emergency contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->after('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->after('emergency_contact_phone')->nullable();
            
            // Medical information
            $table->string('blood_type')->after('emergency_contact_relation')->nullable();
            $table->text('medical_conditions')->after('blood_type')->nullable();
            
            // Financial aid information
            $table->boolean('receives_kip')->after('medical_conditions')->default(false); // KIP receiver
            $table->string('kip_number')->after('receives_kip')->nullable();
            $table->boolean('receives_bidikmisi')->after('kip_number')->default(false);
            
            // Academic preferences
            $table->text('study_motivation')->after('receives_bidikmisi')->nullable();
            $table->text('career_goals')->after('study_motivation')->nullable();
            
            // System fields
            $table->json('integration_metadata')->after('career_goals')->nullable(); // Store integration-related data
            $table->boolean('data_verified')->after('integration_metadata')->default(false);
            $table->timestamp('data_verified_at')->after('data_verified')->nullable();
            $table->unsignedBigInteger('data_verified_by')->after('data_verified_at')->nullable();
            
            // Foreign key for data verifier
            $table->foreign('data_verified_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign(['data_verified_by']);
            
            $table->dropColumn([
                'neo_feeder_id',
                'neo_feeder_synced_at',
                'status_reason',
                'status_changed_at',
                'numb_nisn',
                'numb_npwp',
                'kewarganegaraan',
                'par_guardian_name',
                'par_guardian_job',
                'par_guardian_income',
                'total_sks',
                'ipk',
                'ips',
                'handphone',
                'telepon_rumah',
                'sch_type',
                'sch_province',
                'sch_city',
                'emergency_contact_name',
                'emergency_contact_phone',
                'emergency_contact_relation',
                'blood_type',
                'medical_conditions',
                'receives_kip',
                'kip_number',
                'receives_bidikmisi',
                'study_motivation',
                'career_goals',
                'integration_metadata',
                'data_verified',
                'data_verified_at',
                'data_verified_by'
            ]);
        });
    }
};