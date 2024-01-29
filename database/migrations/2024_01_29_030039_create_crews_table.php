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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string("ktp");
            $table->string('name');
            $table->string("role");
            $table->string("birthplace");
            $table->date("birthdate");
            $table->string("religion");
            $table->string("marital_status");
            $table->string("blood_type");
            $table->longText("address");
            $table->string("phone");
            $table->string("emergency_contact");
            $table->string("email");
            $table->string("passport");
            $table->string("seaman_book");
            $table->string("kk");
            $table->string("npwp");
            $table->string("bpjs_tk");
            $table->string("bpjs_kes");
            $table->string("bank");
            $table->string("bank_account_number");
            $table->string("bank_account_owner");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crews');
    }
};
