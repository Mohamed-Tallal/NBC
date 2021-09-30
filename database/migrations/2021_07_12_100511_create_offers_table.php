<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('city');
            $table->integer('phone');
            $table->string('email');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->double('cost_from');
            $table->double('cost_to');
            $table->string('files')->nullable();
            $table->string('message');
            $table->integer('readable')->default(1);



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
        Schema::dropIfExists('offers');
    }
}
