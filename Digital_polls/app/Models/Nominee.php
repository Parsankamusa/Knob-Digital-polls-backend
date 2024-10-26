namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'unique_id', 'submitted_at'];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'candidate_id');
    }

    public function nominations()
    {
        return $this->hasMany(Nomination::class);
    }
}
