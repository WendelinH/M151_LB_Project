<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kundes', function (Blueprint $table) {
            $table->id();
            $table->date('kunde_seit');
            $table->string('nachname');
            $table->string('ort');
            $table->string('plz');
            $table->string('strasse');
            $table->string('tel');
            $table->string('vorname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunde');
    }
};
