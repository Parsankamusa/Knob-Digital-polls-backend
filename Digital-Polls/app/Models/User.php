<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
