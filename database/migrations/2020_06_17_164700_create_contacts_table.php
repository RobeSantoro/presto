<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {

            //DSL Domain Specific Language
            $table->id();

            $table->string('name',100);
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('mobile');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
