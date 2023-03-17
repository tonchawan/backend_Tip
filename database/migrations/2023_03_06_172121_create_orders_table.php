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
            $table->string("prefix");
            $table->string("name");
            $table->string("lastname");
            $table->string("govermentId");
            $table->string("sub_district");
            $table->string("district");
            $table->string("provience");
            $table->string("email");
            $table->date("dob");
            $table->string("startDate");
            $table->string("endDate");
            $table->string("beneficial");
            $table->integer("OrderStatus");


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
