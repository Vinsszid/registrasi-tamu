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
        Schema::table('tamus', function (Blueprint $table) {
            if (!Schema::hasColumn('tamus', 'lp')) {
                $table->string('lp')->nullable();
            }

            if (!Schema::hasColumn('tamus', 'jabatan')) {
                $table->string('jabatan')->nullable();
            }

            if (!Schema::hasColumn('tamus', 'signature')) {
                $table->text('signature')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tamus', function (Blueprint $table) {
            if (Schema::hasColumn('tamus', 'lp')) {
                $table->dropColumn('lp');
            }

            if (Schema::hasColumn('tamus', 'jabatan')) {
                $table->dropColumn('jabatan');
            }

            if (Schema::hasColumn('tamus', 'signature')) {
                $table->dropColumn('signature');
            }
        });
    }
};
