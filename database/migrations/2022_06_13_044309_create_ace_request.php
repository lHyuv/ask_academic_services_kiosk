<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('ace_requests')) return; 
        Schema::create('ace_requests', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->integer('ace_total_units_on_regi')->nullable();
            $table->year('ace_academic_year_from')->nullable();
            $table->year('ace_academic_year_to')->nullable();
            $table->string('ace_type');
            $table->foreignUuid('submitted_request_id')->nullable()->constrained('submitted_requests')->onDelete('cascade')->onUpdate('cascade');   
            //
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ace_requests');
    }
}
