<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->Integer("user_id")->nullable();
            $table->foreign("user_id")->references('id')->on('customers')->onDelete('cascade');
            $table->Integer("package_id");
            $table->foreign("package_id")->references('id')->on('packages')->onDelete('cascade');
            $table->string("prefix")->nullable();
            $table->string("name")->nullable();
            $table->string("lastname")->nullable();
            $table->string("goverment_id");
            $table->string("sub_district")->nullable();
            $table->string("district")->nullable();
            $table->string("provience")->nullable();
            $table->string("email")->nullable();
            $table->date("dob")->nullable();
            $table->string("start_date")->nullable();
            $table->string("end_date")->nullable();
            $table->string("beneficial")->nullable();
            $table->integer("order_status")->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
