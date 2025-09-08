<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Software>
 */
class SoftwareFactory extends Factory
{
    protected $model = \App\Models\Software::class;

    public function definition(): array
    {
        $softwares = [
            'Microsoft Office', 'Google Chrome', 'Firefox', 'Visual Studio',
            'Apache', 'MySQL', 'Nginx', 'Node.js', 'Docker', 'PostgreSQL'
        ];

        return [
            'asset_id' => Asset::factory(),
            'nombre' => $this->faker->randomElement($softwares),
            'version' => $this->faker->numerify('##.#.#'),
        ];
    }
}
