<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDossiers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->boolean('allergie')->default(false);
            $table->boolean('medicaux')->default(false);
            $table->boolean('chirugicaux')->default(false);
            $table->text('desMedicaux')->nullable();
            $table->text('desAllergie')->nullable();
            $table->text('desChirugicaux')->nullable();
            $table->text('antecedentFamiliaux')->nullable();
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("dossiers", function(Blueprint $table){
            $table->dropForeign("dossiers_patient_id_foreign");
            $table->dropColumn('patient_id');
        });
        Schema::dropIfExists('dossiers');
    }
}
