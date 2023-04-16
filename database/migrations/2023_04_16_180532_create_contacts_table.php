<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('company')->nullable();
        });

        DB::statement('ALTER TABLE contacts ADD COLUMN phone varchar[]');
        DB::statement('ALTER TABLE contacts ADD COLUMN mail varchar[]');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
