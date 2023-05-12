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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('scientific_name')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->bigInteger('views')->default(0);
            $table->longText('contents')->nullable();
            $table->longText('excerpts')->nullable();
            $table->longText('extra')->nullable();
            $table->text('names')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
