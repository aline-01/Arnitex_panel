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
        Schema::create("task_list", function (Blueprint $table) {
            $table->id();
            $table->string("title",200);
            $table->longText("descryption");
            $table->string("file")->default("not_set");
            $table->integer("personel_id");//task for who
            $table->enum("is_it_done",["done","in_process"])->default("in_process");
            $table->foreign("personel_id")->references("id")->on("personel");//who must receve the message can me of admins            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("task_list");
    }
};
