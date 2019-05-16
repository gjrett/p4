<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectVineyardsAndWines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wines', function (Blueprint $table) {

            # Remove the field associated with the old way we were storing vineyards
            # Can do this here, or update the original migration that creates the `wines` table
            # $table->dropColumn('vineyard');

            # Add a new INT field called `vineyard_id` that has to be unsigned (i.e. positive)
            $table->bigInteger('vineyard_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the vineyards` table
            $table->foreign('vineyard_id')->references('id')->on('vineyards');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('wines_vineyard_id_foreign');

            $table->dropColumn('vineyard_id');
        });
    }
}