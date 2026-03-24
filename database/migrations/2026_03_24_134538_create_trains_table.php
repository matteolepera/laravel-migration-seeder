<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            //Azienda
            $table->string("company");
            //Stazione di partenza
            $table->string("departure_station");
            //Stazione di arrivo
            $table->string("arrival_station");
            //Orario di partenza
            $table->dateTime("departure_at");
            //Orario di arrivo
            $table->dateTime("arrival_at");
            //Codice Treno
            $table->string("train_code")->unique();
            //Totale Carrozze
            $table->integer("total_carriages");
            //Se in orario o meno
            $table->boolean("is_on_time")->default(true);
            //Se cancellato o meno
            $table->boolean("is_cancelled")->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
