<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
class MigrateTenants extends Command
{
    protected $signature = 'migrate:tenants';
    protected $description = 'Run migrations for all tenants';
    public function handle()
    {
        Tenant::all()->each(function (Tenant $tenant) {
            tenant($tenant);
            $this->call('migrate', [
                '--database' => 'tenant',
                '--path' => 'database/migrations/tenant',
                '--force' => true,
            ]);
        });
        $this->info('Tenant migrations completed successfully.');
    }
}
