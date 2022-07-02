<?php

  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;

  class CreateCurrenciesTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('currencies', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('code');
        $table->integer('sort')->default(1)->nullable();
        $table->float('value')->default(1);
        $table->enum('status', ['0', '1'])->default(1);
        $table->enum('favorite', ['0', '1'])->default(0);
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
      Schema::dropIfExists('currencies');
    }
  }
