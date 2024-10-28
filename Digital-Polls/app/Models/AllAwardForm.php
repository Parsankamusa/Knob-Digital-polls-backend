<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllAwardForm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'from', 'to', 'action', 'new_award_id'];

    public function newAward()
    {
        return $this->belongsTo(NewAward::class);
    }
}
