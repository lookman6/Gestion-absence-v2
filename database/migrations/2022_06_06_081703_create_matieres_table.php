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
        Schema::disableForeignKeyConstraints();
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->timestamps();

            $table->unsignedBigInteger('module_id');
                $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->unsignedBigInteger('professeur_id');
                $table->foreign('professeur_id')
                ->references('id')
                ->on('professeurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
};
