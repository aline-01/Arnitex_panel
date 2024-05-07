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
        Schema::create("message", function (Blueprint $table) {
            $table->id();
            $table->longText("content");
            $table->integer("personel_id");
            $table->integer("personel_target");
            $table->string("send_data");
            $table->boolean("is_read")->default(0);
            $table->foreign("personel_id")->references("id")->on("personel");//who send the message
            $table->foreign("personel_target")->references("id")->on("personel");//who must receve the message can me of admins
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("message");
    }
};
