<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cve>
 */
class CveFactory extends Factory
{
    protected $model = \App\Models\Cve::class;

    public function definition(): array
    {
        $criticidad = ['baja', 'media', 'alta', 'critica'];

        return [
            'cve_id' => 'CVE-' . $this->faker->numberBetween(2020, 2025) . '-' . $this->faker->numberBetween(10000, 99999),
            'descripcion' => $this->faker->sentence(8),
            'cvss' => $this->faker->randomFloat(1, 0, 10),
            'criticidad' => $this->faker->randomElement($criticidad),
            'publicacion' => $this->faker->date()
        ];
    }
}
