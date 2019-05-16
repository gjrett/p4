<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagWineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_wine', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            # `wine_id` and `tag_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `wine_id` will reference the `wines table` and `tag_id` will reference the `tags` table.
            $table->bigInteger('wine_id')->unsigned()->nullable();
            $table->bigInteger('tag_id')->unsigned()->nullable();

            # Make foreign keys
            $table->foreign('wine_id')->references('id')->on('wines');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tag_wine');
    }
}