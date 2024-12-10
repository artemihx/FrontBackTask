<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('slogan');
            $table->string('adress');
            $table->string('phone');
            $table->string('email');
            $table->string('worktime');
            $table->string('vk');
            $table->string('tg');
            $table->string('whatsapp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('headers');
    }
}
