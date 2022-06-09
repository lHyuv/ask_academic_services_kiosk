<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('receipts')) return; 
        Schema::create('receipts', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->foreignUuid('submitted_request_id')->nullable()->constrained('submitted_requests')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('receipt_no');
            $table->float('fee')->default(0.00);
            $table->string('item');
            $table->text('details')->nullable();
            $table->foreignUuid('certified_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('signed_status')->default('Pending');

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
        Schema::dropIfExists('receipts');
    }
}
