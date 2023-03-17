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
            $table->timestamps();

            $table->string("prefix");
            $table->string("username")->unique();
            $table->string("password");
            $table->string("name");
            $table->string("lastname");
            $table->string("sub_district");
            $table->string("district");
            $table->string("provience");
            $table->string("phone")->nullable();
            $table->string("email")->unique();
            $table->string("govermentId")->unique();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
