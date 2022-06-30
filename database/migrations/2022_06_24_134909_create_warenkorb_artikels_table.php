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
        Schema::create('warenkorb_artikels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warenkorb_id')->constrained()->cascadeOnDelete();
            $table->foreignId('artikel_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('warenkorb_artikels');
    }
};
