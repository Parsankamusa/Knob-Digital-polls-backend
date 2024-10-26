namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAward extends Model
{
    use HasFactory;

    protected $fillable = ['award_name', 'award_period', 'sponsors', 'partners'];

    public function allAwardForms()
    {
        return $this->hasMany(AllAwardForm::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}
