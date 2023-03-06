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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string("username");
            $table->string("password");
            $table->string("name");
            $table->string("lastname");
            $table->string("prefix");
            $table->string("address");
            $table->string("phone");
            $table->string("email");
            $table->string("registerId");
            $table->string("govermentId");
            $table->date("dateRegister");
            $table->integer("packageId");

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
