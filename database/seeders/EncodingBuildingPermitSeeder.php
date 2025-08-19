<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EncodingBuildingPermit;

class EncodingBuildingPermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EncodingBuildingPermit::factory()->count(50)->create();
    }
}
