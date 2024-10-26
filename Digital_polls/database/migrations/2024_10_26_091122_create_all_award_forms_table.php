use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllAwardsFormTable extends Migration
{
    public function up()
    {
        Schema::create('all_awards_form', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('from');
            $table->string('to');
            $table->string('action', 50);
            $table->foreignId('new_award_id')->constrained('new_award')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('all_awards_form');
    }
}
