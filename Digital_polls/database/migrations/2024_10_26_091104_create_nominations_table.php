use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nominee_id')->constrained('nominees')->onDelete('cascade');
            $table->date('date');
            $table->date('expiring_date');
            $table->string('status', 50)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nominations');
    }
}
