<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix');
            $table->decimal('volume');
            $table->string('description');
            $table->string('type_emballage');
            $table->foreignId('produit_id')
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
        Schema::dropIfExists('type_produits');
    }
}
