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
        Schema::create('business_contact_details', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('business_id')->nullable();
            $table->string('name')->nullable();
            $table->string('contactno')->nullable();
            $table->string('extension')->nullable();
            $table->string('email')->nullable();
            $table->string('usertype')->nullable();
            $table->string('warehouse')->nullable();
            $table->tinyInteger('isactive')->default(0)->nullable();
            $table->tinyInteger('isdefault')->default(0)->nullable();
            $table->timestamp('createdon')->nullable();
            $table->timestamp('updatedon')->nullable();
            $table->smallInteger('createdby')->nullable();
            $table->smallInteger('updatedby')->nullable();
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
        Schema::dropIfExists('business_contact_details');
    }
};
