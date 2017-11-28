<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('content');
//            $table->unsignedInteger('status');
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
        Schema::dropIfExists('template');
    }
}
