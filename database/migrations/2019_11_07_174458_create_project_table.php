<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
          Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->decimal('value', 10, 2);
            $table->string('temp');
            $table->string('imagem', 1000);
            $table->string('supporter');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
         
    }
}
