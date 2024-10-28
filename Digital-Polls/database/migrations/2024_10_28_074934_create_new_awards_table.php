<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewAwardTable extends Migration
{
    public function up()
    {
        Schema::create('new_award', function (Blueprint $table) {
            $table->id();
            $table->string('award_name');
            $table->string('award_period')->nullable();
            $table->string('sponsors')->nullable();
            $table->string('partners');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_award');
    }
}
