<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'email', 'company_name'];

    public function newAwards()
    {
        return $this->belongsToMany(NewAward::class);
    }
}
