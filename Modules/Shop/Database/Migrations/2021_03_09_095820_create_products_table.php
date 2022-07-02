<?php

  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;

  class CreateProductsTable extends Migration
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
        $table->bigInteger('category_id')->unsigned()->default(1);
        $table->string('title_uk')->nullable();
        $table->string('title_ru')->nullable();
        $table->string('slug', 255)->unique();
        $table->text('content_ru')->nullable();
        $table->text('content_uk')->nullable();
        $table->float('price')->default(0);
        $table->float('old_price')->default(0)->nullable();
        $table->enum('status', ['0', '1'])->default(1);
        $table->string('keywords', 255)->default(NULL)->nullable();
        $table->text('description_ru')->nullable();
        $table->text('description_uk')->nullable();
        $table->string('img', 255)->nullable();
        $table->integer('sort')->default(1);
        $table->enum('hit', ['0', '1'])->default(0)->index();

        $table->timestamps();
        $table->softDeletes();

        $table->foreign('category_id')->references('id')->on('product_categories');
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
  }
