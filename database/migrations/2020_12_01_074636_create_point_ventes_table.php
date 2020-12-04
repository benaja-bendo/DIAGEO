<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('geolocalisation_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('type_point_vente_id')
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_ventes');
    }
}
