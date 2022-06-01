<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name');
            $table->string('user_name');
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('type');
            $table->string('condition');
            $table->string('total_price')->nullable();
            $table->string('tracking_code');
            $table->string('description');
            $table->string('status')->default('0');
            $table->string('image')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('repairs');
    }
};









