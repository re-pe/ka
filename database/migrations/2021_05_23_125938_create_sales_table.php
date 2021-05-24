<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pardavimai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('darbuotojo_id')->constrained('darbuotojai')->onDelete('cascade');
            $table->unsignedInteger('sutarties_nr')->unique();
            $table->unsignedTinyInteger('greitis')->default('0');
            $table->unsignedTinyInteger('aptarnavimas')->default('0');
            $table->unsignedTinyInteger('rekomendacija')->default('0');
            $table->text('pastabos')->default('');
            $table->boolean('sutikimas');
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
        Schema::dropIfExists('pardavimai');
    }
}
