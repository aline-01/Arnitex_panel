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
        Schema::create("admin_message_replay", function (Blueprint $table) {
            $table->id();
            $table->longText("content");
            // $table->integer("sender");
            $table->integer("message_id");
            // $table->foreign("sender")->references("id")->on("personel");//who send the message
            $table->foreign("message_id")->references("id")->on("personel");//who send the message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("admin_message_replay");
    }
};
