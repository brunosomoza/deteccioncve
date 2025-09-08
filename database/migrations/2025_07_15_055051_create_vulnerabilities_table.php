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
        Schema::create('vulnerabilities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->foreignId('software_id')->constrained('softwares')->onDelete('cascade');
            $table->foreignId('cve_id')->constrained('cves')->onDelete('cascade');
            $table->enum('estado', ['pendiente', 'aceptado', 'en remediacion', 'remediado']);
            $table->timestamp('fecha_detectada');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vulnerabilities');
    }
};
