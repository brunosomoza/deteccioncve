<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    protected $model = \App\Models\Asset::class;

    public function definition(): array
    {
        $tipos = ['PC', 'laptop', 'servidor'];
        $estados = ['activo', 'inactivo'];
        $so = ['Windows 10', 'Windows 11', 'Ubuntu 22.04', 'CentOS 8', 'Debian 12'];

        return [
            'nombre_equipo' => $this->faker->unique()->word . '-' . $this->faker->numberBetween(1, 99),
            'tipo' => $this->faker->randomElement($tipos),
            'sistema_operativo' => $this->faker->randomElement($so),
            'estado' => $this->faker->randomElement($estados),
        ];
    }
}
