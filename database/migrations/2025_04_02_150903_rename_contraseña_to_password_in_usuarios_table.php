<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
       
            $table->string('password')->nullable();
        });

     
        DB::statement('UPDATE usuarios SET password = contraseña');

        Schema::table('usuarios', function (Blueprint $table) {
       
            $table->dropColumn('contraseña');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
         
            $table->string('contraseña')->nullable();
        });

        DB::statement('UPDATE usuarios SET contraseña = password');

        Schema::table('usuarios', function (Blueprint $table) {
         
            $table->dropColumn('password');
        });
    }
};