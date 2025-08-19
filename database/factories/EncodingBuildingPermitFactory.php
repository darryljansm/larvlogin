<?php

namespace Database\Factories;

use App\Models\EncodingBuildingPermit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EncodingBuildingPermit>
 */
class EncodingBuildingPermitFactory extends Factory
{
    protected $model = EncodingBuildingPermit::class;

    public function definition(): array
    {
        return [
            'application_number'   => $this->faker->unique()->numerify('APP-#####'),
            'or_number'            => $this->faker->optional()->numerify('OR-#####'),
            'building_permit_number' => $this->faker->optional()->numerify('BP-#####'),
            'date_issued'          => $this->faker->optional()->date(),
            'applicant_name'       => $this->faker->name(),
            'location'             => $this->faker->address(),
            'use_or_coc'           => $this->faker->randomElement(['Residential', 'Commercial', 'Industrial']),
            'project_title'        => $this->faker->sentence(3),
            'area'                 => $this->faker->randomFloat(2, 50, 1000) . ' sqm',
            'estimated_cost'       => $this->faker->randomFloat(2, 50000, 5000000),
            'building_permit_fee'  => $this->faker->randomFloat(2, 500, 50000),
            'created_by'           => 1, // or Auth::id() in real cases
            'updated_by'           => null,
            'deleted_by'           => null,
        ];
    }
}
