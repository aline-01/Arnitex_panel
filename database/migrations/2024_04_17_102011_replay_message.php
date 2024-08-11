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
        Schema::create("replay_message", function (Blueprint $table) {
            $table->id();
            $table->string("content");
            $table->integer("personel_id");
            $table->integer("personel_target");
            $table->integer("message_id");
            $table->string("send_data");
            $table->foreign("personel_id")->references("id")->on("personel");
            $table->foreign("message_id")->references("id")->on("messages");
            $table->foreign("personel_target")->references("id")->on("personel");
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("replay_message");
    }
};
