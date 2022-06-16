<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggedSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('tagged_subjects')) return; 
        Schema::create('tagged_subjects', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->foreignUuid('ace_request_id')->nullable()->constrained('ace_requests')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('acad_head')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('tagged_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('acknowledged_id')->nullable()->constrained('acknowledgments')->onDelete('cascade')->onUpdate('cascade');      
            //subject fk
            $table->uuid('subject_id');//foreignUuid('subject_id')->constrained('subjects')->onDelete('cascade')->onUpdate('cascade');   
            $table->string('day');
            //V2
            $table->time('time_from');
            $table->time('time_to');
            //V2:end
            $table->integer('no_of_units');
            //room fk
            $table->uuid('room_id');//foreignUuid('room_id')->constrained('rooms')->onDelete('cascade')->onUpdate('cascade');   
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
        Schema::dropIfExists('tagged_subjects');
    }
}
