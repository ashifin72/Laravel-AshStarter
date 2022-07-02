<?php

  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;

  class CreateProductCategoriesTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product_categories', function (Blueprint $table) {
        $table->id();
        $table->string('title_uk', 255);
        $table->string('title_ru', 255);
        $table->string('img')->nullable();
        $table->string('icon')->nullable();
        $table->string('slug', 255)->unique();
        $table->tinyInteger('parent_id')->unsigned()->default(0);
        $table->string('keywords', 255)->nullable();
        $table->string('description_uk', 255)->nullable();
        $table->string('description_ru', 255)->nullable();
        $table->enum('status',['0','1'])->default(1);
        $table->integer('sort')->default(1);
        $table->timestamps();
        $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('product_categories');
    }
  }
