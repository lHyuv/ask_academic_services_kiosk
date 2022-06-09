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
        Schema::create('submitted_requests', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('request_status')->default('Pending');
            $table->string('completed_status')->default('Pending');
            $table->string('release_status')->default('Pending');
            $table->string('application_status')->default('Pending');
            $table->string('signed_status')->default('Pending');
            $table->string('signed_student_status')->default('Pending');
            $table->text('request_details')->nullable();
            $table->date('request_deadline');
            $table->year('school_year');
            $table->string('control_no')->nullable();
            $table->text('reason')->nullable();
            //
            //fk ids:
            $table->foreignUuid('approved_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignUuid('forward_to')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('client')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');    
            $table->foreignUuid('received_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('request_id')->nullable()->constrained('requests')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('submitted_requests');
    }
}
