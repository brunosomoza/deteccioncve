<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // -------------------
        // 1️⃣ Users
        // -------------------
        DB::table('users')->insert([
            [
                'name' => 'Carlos Pérez',
                'email' => 'carlos@example.com',
                'password' => Hash::make('password'),
                'role' => 'soporte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana@example.com',
                'password' => Hash::make('password'),
                'role' => 'ciberseguridad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bruno Somoza',
                'email' => 'bsomoza@wardia.com.pe',
                'password' => Hash::make('&5hgjHh_!134'),
                'role' => 'ciberseguridad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // -------------------
        // 2️⃣ Assets
        // -------------------
        DB::table('assets')->insert([
            ['nombre_equipo' => 'PC-Oficina-01', 'tipo' => 'PC', 'sistema_operativo' => 'Windows 10', 'estado' => 'activo', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_equipo' => 'Servidor-App01', 'tipo' => 'servidor', 'sistema_operativo' => 'Ubuntu 22.04', 'estado' => 'activo', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_equipo' => 'Laptop-Juan', 'tipo' => 'laptop', 'sistema_operativo' => 'Windows 11', 'estado' => 'activo', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------
        // 3️⃣ Softwares
        // -------------------
        DB::table('softwares')->insert([
            ['asset_id' => 1, 'nombre' => 'Microsoft Office', 'version' => '2021', 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 1, 'nombre' => 'Google Chrome', 'version' => '116.0.5845.179', 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 2, 'nombre' => 'Apache', 'version' => '2.4.57', 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 2, 'nombre' => 'MySQL', 'version' => '8.0.34', 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 3, 'nombre' => 'Visual Studio', 'version' => '2022', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------
        // 4️⃣ CVEs
        // -------------------
        DB::table('cves')->insert([
            ['cve_id' => 'CVE-2023-12345', 'descripcion' => 'Vulnerabilidad crítica en Apache', 'cvss' => 9.8, 'criticidad' => 'critica', 'created_at' => now(), 'updated_at' => now(), 'publicacion' => now()],
            ['cve_id' => 'CVE-2023-23456', 'descripcion' => 'RCE en Google Chrome', 'cvss' => 8.7, 'criticidad' => 'alta', 'created_at' => now(), 'updated_at' => now(), 'publicacion' => now()],
            ['cve_id' => 'CVE-2022-34567', 'descripcion' => 'Desbordamiento de buffer en MySQL', 'cvss' => 7.5, 'criticidad' => 'media', 'created_at' => now(), 'updated_at' => now(), 'publicacion' => now()],
        ]);

        // -------------------
        // 5️⃣ Vulnerabilities
        // -------------------
        DB::table('vulnerabilities')->insert([
            ['asset_id' => 1, 'software_id' => 2, 'cve_id' => 2, 'estado' => 'pendiente', 'fecha_detectada' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 2, 'software_id' => 3, 'cve_id' => 1, 'estado' => 'en remediacion', 'fecha_detectada' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['asset_id' => 2, 'software_id' => 4, 'cve_id' => 3, 'estado' => 'aceptado', 'fecha_detectada' => now(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------
        // 6️⃣ Reports
        // -------------------
        DB::table('reports')->insert([
            ['user_id' => 1, 'asset_id' => 1, 'tipo' => 'vulnerabilidad', 'contenido' => '{"cve":"CVE-2023-23456","descripcion":"RCE en Chrome"}', 'formato' => 'pdf', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'asset_id' => 2, 'tipo' => 'remediacion', 'contenido' => '{"cve":"CVE-2023-12345","estado":"en remediacion"}', 'formato' => 'xls', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------
        // 7️⃣ Backups
        // -------------------
        DB::table('backups')->insert([
            ['ruta_archivo' => '/backups/backup_2025-08-16.sql', 'fecha_respaldo' => now(), 'estado' => 'completado', 'created_at' => now(), 'updated_at' => now()],
            ['ruta_archivo' => '/backups/backup_2025-08-15.sql', 'fecha_respaldo' => now()->subDay(), 'estado' => 'fallido', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
