<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProviderDocumentType;

class ProviderDocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            ['name' => 'Aadhaar Card', 'is_required' => true],
            ['name' => 'PAN Card', 'is_required' => true],
            ['name' => 'Driving License', 'is_required' => false],
            ['name' => 'Voter ID', 'is_required' => false],
            ['name' => 'Electricity Bill', 'is_required' => false],
        ];

        foreach ($documents as $document) {
            ProviderDocumentType::updateOrCreate(
                ['name' => $document['name']],
                [
                    'is_required' => $document['is_required'],
                    'is_active' => true,
                ]
            );
        }
    }
}