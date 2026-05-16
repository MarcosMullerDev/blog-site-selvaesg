<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->text('text');

            $table->string('image')->nullable();

            $table->string('instagram')->nullable();

            $table->string('linkedin')->nullable();

            $table->boolean('active')
                ->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};