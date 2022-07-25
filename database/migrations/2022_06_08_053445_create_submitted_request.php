<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittedRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('submitted_requests')) return; 
        Schema::create('submitted_requests', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('student_number')->nullable();
            $table->string('reference_number')->unique();
            $table->foreignUuid('request_id')->nullable()->constrained('requests')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('ticket_status')->default('Pending');
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
        Schema::dropIfExists('submitted_requests');
    }
}
