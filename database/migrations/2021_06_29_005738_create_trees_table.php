<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->string('tree_name');
            $table->string('tree_scientific_name')->nullable();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('tree_width')->nullable();
            $table->string('tree_height')->nullable();
            $table->double('tree_price');
            $table->text('location')->nullable();
            $table->text('tree_info')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_ecommerce')->default(0);
            $table->text('slug');
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
        Schema::dropIfExists('trees');
    }
}
