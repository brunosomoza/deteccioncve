<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Software;
use App\Models\Cve;
use App\Models\Vulnerability;

class AutomaticSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 100 Assets
        $assets = Asset::factory(89)->create();

        // Para cada Asset, generar entre 1 y 5 softwares
        $assets->each(function ($asset) {
            $softwares = Software::factory(rand(1, 4))->create(['asset_id' => $asset->id]);

            // Para cada software, generar entre 0 y 2 vulnerabilidades
            foreach ($softwares as $software) {
                $cves = Cve::factory(rand(1, 2))->create();
                foreach ($cves as $cve) {
                    Vulnerability::factory()->create([
                        'asset_id' => $asset->id,
                        'software_id' => $software->id,
                        'cve_id' => $cve->id,
                    ]);
                }
            }
        });
    }
}
