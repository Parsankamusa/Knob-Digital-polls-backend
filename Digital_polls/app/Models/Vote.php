namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'candidate_id', 'mpesa_ref_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nominee()
    {
        return $this->belongsTo(Nominee::class, 'candidate_id');
    }
}
