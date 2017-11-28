<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBunchesTable extends Migration
{
    public function up()
    {
        Schema::create('bunches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
//            $table->timestamp('deleted_at')->nullable();
            $table->softDeletes();
            $table->integer('created_by',false)->default(1);
            $table->integer('updated_by',false)->default(1);
            $table->integer('deleted_by',false)->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bunches');
    }
}
