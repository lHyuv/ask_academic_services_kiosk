<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('forms')) return; 
        Schema::create('forms', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('form_name');
            $table->string('request_id')->nullable()->constrained('requests')->onDelete('cascade')->onUpdate('cascade');
            $table->text('source')->nullable();
            $table->string('form_file_name')->nullable(); 
            $table->string('form_file_path')->nullable(); 
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
        Schema::dropIfExists('forms');
    }
}
