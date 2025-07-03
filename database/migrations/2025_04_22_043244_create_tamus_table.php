<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lp');
            $table->string('jabatan');
            $table->string('nomor_hp', 20);
            $table->string('waktu');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('acara');
            $table->string('asal_daerah');
            $table->text('signature');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
