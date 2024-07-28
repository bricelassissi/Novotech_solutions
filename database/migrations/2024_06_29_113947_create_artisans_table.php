<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('metier_id')->constrained('metiers')->onDelete('cascade');
            $table->string('ville');
            $table->string('quartier');
            $table->string('poste_occupe_dans_l_entreprise');
            $table->longText('description');
            $table->string('telephone');
            $table->string('telephone_whatsapp')->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('zone_couverture');
            $table->string('anciennete')->nullable();
            $table->string('plage_horaire');
            $table->string('jour_travaille');
            $table->string('registre_commerce');
            $table->string('numero_registre_commerce')->nullable();
            $table->string('photo_profile')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
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
        Schema::dropIfExists('artisans');
    }
}
