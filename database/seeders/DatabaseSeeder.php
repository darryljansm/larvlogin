<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin or test user
        User::factory()->create([
            'first_name' => 'Juan',
            'middle_name' => 'Santos',
            'last_name' => 'Dela Cruz',
            'address' => 'Pampanga',
            'contact_no' => '09123456789',
            'email' => 'test@admin.com',
            'username' => 'admin',
            'password' => Hash::make('admin'), // default password: password
            'created_by' => 1,
            'updated_by' => null,
        ]);

        // Optionally create more users for testing
        User::factory(10)->create();

        // Call additional seeders
        $this->call([
            EncodingBuildingPermitSeeder::class,
        ]);
    }
}
