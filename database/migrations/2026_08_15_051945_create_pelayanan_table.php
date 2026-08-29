<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('no_hp', 20);
            $table->string('jenis_pelayanan');
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable(); // untuk nama file upload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};
