<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->string('subtitle')->nullable();

            $table->string('cover_image')->nullable();

            $table->string('author')->nullable();

            $table->string('category')->nullable();

            $table->string('tags')->nullable();

            $table->enum('status', ['draft', 'published'])
                ->default('published');

            $table->boolean('featured')
                ->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropColumn([
                'subtitle',
                'cover_image',
                'author',
                'category',
                'tags',
                'status',
                'featured'
            ]);

        });
    }
};