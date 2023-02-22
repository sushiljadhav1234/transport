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
        Schema::create('business_warehouse_details', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('business_id')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->string('warehouse_street')->nullable();
            $table->string('warehouse_city');
            $table->string('warehouse_state');
            $table->string('warehouse_zip');
            $table->string('warehouse_type');
            $table->string('warehouse_frieght');
            $table->timestamp('createdon')->nullable();
            $table->timestamp('updatedon')->nullable();
            $table->smallInteger('createdby');
            $table->smallInteger('updatedby');
            $table->softDeletes('isdeleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_warehouse_details');
    }
};
