<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcknowledgment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('acknowledgments')) return; 
        Schema::create('acknowledgments', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('receipt_id')->nullable()->constrained('receipts')->onDelete('cascade')->onUpdate('cascade'); 
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
        Schema::dropIfExists('acknowledgments');
    }
}
