<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Languages
        |--------------------------------------------------------------------------
        */
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
                'is_default' => true,
                'status' => true,
            ],
            [
                'name' => 'Hindi',
                'code' => 'hi',
                'is_default' => false,
                'status' => true,
            ],
            [
                'name' => 'Punjabi',
                'code' => 'pa',
                'is_default' => false,
                'status' => true,
            ],
        ];

        foreach ($languages as $language) {
            DB::table('languages')->updateOrInsert(
                ['code' => $language['code']],
                [
                    'name' => $language['name'],
                    'is_default' => $language['is_default'],
                    'status' => $language['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Provider']);
        Role::firstOrCreate(['name' => 'Customer']);

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */
        $settings = [
            [
                'group' => 'general',
                'key' => 'app_name',
                'value' => 'ServiceHub',
                'description' => 'Application Name',
            ],
            [
                'group' => 'general',
                'key' => 'support_email',
                'value' => 'support@servicehub.com',
                'description' => 'Support Email',
            ],
            [
                'group' => 'general',
                'key' => 'support_phone',
                'value' => '',
                'description' => 'Support Phone',
            ],

            [
                'group' => 'subscription',
                'key' => 'trial_days',
                'value' => '30',
                'description' => 'Free Trial Days',
            ],
            [
                'group' => 'subscription',
                'key' => 'registration_fee',
                'value' => '100',
                'description' => 'Registration Fee',
            ],

            [
                'group' => 'theme',
                'key' => 'primary_color',
                'value' => '#FFC107',
                'description' => 'Primary Theme Color',
            ],
            [
                'group' => 'theme',
                'key' => 'secondary_color',
                'value' => '#212121',
                'description' => 'Secondary Theme Color',
            ],
            [
                'group' => 'theme',
                'key' => 'button_color',
                'value' => '#FF9800',
                'description' => 'Button Color',
            ],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                [
                    'group' => $setting['group'],
                    'key' => $setting['key'],
                ],
                [
                    'value' => $setting['value'],
                    'description' => $setting['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}