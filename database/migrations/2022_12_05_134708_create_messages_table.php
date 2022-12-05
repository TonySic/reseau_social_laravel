<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            // génère un id unique et non-nul
            $table->id();
            // champs created_at et updated_at
            $table->timestamps();
            // contenu du message (maxi 3000)
            $table->text('contenu', 3000);
            // image et tag associés au message
            $table->string('image');
            $table->string('tags', 50);
            // clé étrangère vers table "user"
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
