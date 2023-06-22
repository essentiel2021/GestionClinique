<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medecin_id')->constrained();
            $table->foreignId('clinique_id')->constrained();
            $table->foreignId('assurance_id')->constrained();
            $table->string("nom");
            $table->string("prenom");
            $table->date("dateNaissance")->nullable();
            $table->char('sexe');
            $table->string("telephone",)->nullable();
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
        Schema::table("patients", function(Blueprint $table){
            $table->dropForeign("patients_medecin_id_foreign");
            $table->dropColumn('medecin_id');

            $table->dropForeign("patients_clinique_id_foreign");
            $table->dropColumn('clinique_id');

            $table->dropForeign("patients_assurance_id_foreign");
            $table->dropColumn('assurance_id');
        });
        Schema::dropIfExists('patients');
    }
}
