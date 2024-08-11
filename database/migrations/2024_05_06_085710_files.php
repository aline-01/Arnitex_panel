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
        Schema::create("files", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("path");
            $table->integer("personel_id");//who was send the file
            $table->integer("personel_target");//who was must receive the file
            $table->foreign("personel_id")->references("id")->on("personel");
            $table->foreign("personel_target")->references("id")->on("personel");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
