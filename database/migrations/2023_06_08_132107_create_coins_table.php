<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('name');
            $table->json('platforms');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
