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

            $table->Integer("userId")->nullable();
            $table->foreign("userId")->references('id')->on('customers')->onDelete('cascade');
            $table->Integer("packageId");
            $table->foreign("packageId")->references('id')->on('packages')->onDelete('cascade');
            $table->string("prefix")->nullable();
            $table->string("name")->nullable();
            $table->string("lastname")->nullable();
            $table->string("govermentId");
            $table->string("sub_district")->nullable();
            $table->string("district")->nullable();
            $table->string("provience")->nullable();
            $table->string("email")->nullable();
            $table->date("dob")->nullable();
            $table->string("startDate")->nullable();
            $table->string("endDate")->nullable();
            $table->string("beneficial")->nullable();
            $table->integer("OrderStatus")->nullable();


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
