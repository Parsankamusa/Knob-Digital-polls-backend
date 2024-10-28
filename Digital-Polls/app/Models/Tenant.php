<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Identification\Contracts\Tenant as TenantContract;
use Tenancy\Affects\Connections\Contracts\ProvidesDatabase;
class Tenant extends Model implements TenantContract, ProvidesDatabase
{
    // Identify the tenant based on the domain or subdomain
    protected $fillable = ['name', 'domain'];
    public function getTenantKey(): string
    {
        return 'domain';
    }
    public function getConnectionName(): string
    {
        return 'tenant';
    }
    public function configureDatabase($event): void
    {
        $event->useConnection('tenant', [
            'database' => 'tenant_' . $this->id,
        ]);
    }
}
