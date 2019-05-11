<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('username', 30);
			$table->string('userEmail', 30);
			$table->string('urlLink', 30)->nullable();
			$table->text('message');
			$table->string('userIp', 16);
			$table->string('userBrowser', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
