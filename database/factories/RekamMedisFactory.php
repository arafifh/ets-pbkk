<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RekamMedis>
 */
class RekamMedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = RekamMedis::class;

    public function definition(): array
    {
        return [
            'pasien_id' => Pasien::all()->random()->id,
            'dokter_id' => Dokter::all()->random()->id,
            'kondisi_kesehatan' => $this->faker->text,
            'suhu_tubuh' => $this->faker->randomFloat(1, 35, 45.5),
            'resep_file' => $this->faker->text,
            'created_at' => $this->faker->dateTimeThisMonth,
            'updated_at' => now(),
        ];
    }
}
