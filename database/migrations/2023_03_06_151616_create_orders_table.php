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

            $table->string("userId");
            $table->string("name");
            $table->string("lastname");
            $table->string("prefix");
            $table->string("govermentId");
            $table->string("address");
            $table->string("email");
            $table->date("dob");
            $table->string("startDate");
            $table->string("endDate");
            $table->string("beneficial");

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
