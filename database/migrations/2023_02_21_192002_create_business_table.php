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
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('warehouse_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('region_served');
            $table->string('notes');
            $table->string('user_type');
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
        Schema::dropIfExists('business');
    }
};
