<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id_com');
            $table->integer('id_cli');
            $table->integer('id_phar');
            $table->string('adresse');
            $table->string('has_ordnance')->nullable();
            $table->string('status')->nullable();
            $table->string('comments')->nullable();
            $table->string('prix')->nullable();
            $table->dateTime('date_livraison')->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
