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
        Schema::create('cves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cve_id')->unique(); // Ej: CVE-2023-12345
            $table->text('descripcion');
            $table->decimal('cvss', 3, 1); // RF05
            $table->enum('criticidad', ['baja', 'media', 'alta', 'critica']);
            $table->date('publicacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cves');
    }
};
