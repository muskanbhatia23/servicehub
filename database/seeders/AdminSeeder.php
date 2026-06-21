<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
        ]);

        $admin = User::updateOrCreate(
            [
                'email' => 'admin@com.com',
            ],
            [
                'name' => 'Super Admin',
                'mobile' => '9999999999',
                'password' => Hash::make('12345678'),
                'status' => true,
            ]
        );

        if (! $admin->hasRole('Admin')) {
            $admin->assignRole($adminRole);
        }
    }
}