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
        Schema::table('projects', function (Blueprint $table) {
            // creo la colonna contenente la foreign-key
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // qui assegno la foreign key assegnando il campo id della tabella types
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // elimino la foreign key
            $table->dropForeign('projects_type_id_foreign');
            // elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
