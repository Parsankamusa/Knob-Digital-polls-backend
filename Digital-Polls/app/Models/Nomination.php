namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    use HasFactory;

    protected $fillable = ['nominee_id', 'date', 'expiring_date', 'status'];

    public function nominee()
    {
        return $this->belongsTo(Nominee::class);
    }
}
