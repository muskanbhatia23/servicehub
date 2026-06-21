<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\InitialDataSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\ProviderDocumentTypeSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
     public function run(): void
{
    $this->call([
        InitialDataSeeder::class,
        AdminSeeder::class,
        ProviderDocumentTypeSeeder::class,
    ]);

}
}
