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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('author_id')->nullable()->index();
            $table->integer('publisher_id')->nullable()->index();
            $table->integer('category_id')->nullable()->index();
            $table->string('cover')->nullable();
            $table->integer('price')->nullable();
            $table->dateTime('publish_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
