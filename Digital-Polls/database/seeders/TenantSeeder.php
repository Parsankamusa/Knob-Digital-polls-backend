<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'Tenant One',
            'domain' => 'tenant1.example.com',
        ]);
        Tenant::create([
            'name' => 'Tenant Two',
            'domain' => 'tenant2.example.com',
        ]);
    }
}
