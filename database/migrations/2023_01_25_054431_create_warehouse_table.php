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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse', '200');
            $table->string('address_street', '250');
            $table->string('address_city', '50');
            $table->string('address_state', '50');
            $table->string('address_zip', '20');
            $table->text('contact_person_details');
            $table->string('warehouse_type', '30');
            $table->tinyInteger('createdby');
            $table->tinyInteger('updatedby');
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
        Schema::dropIfExists('warehouse');
    }
};
