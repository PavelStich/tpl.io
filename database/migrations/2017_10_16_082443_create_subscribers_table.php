<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email');
//            $table->unsignedInteger('status');
            $table->integer('bunch_id')->unsigned();
//            $table->text('description');
            $table->timestamps();
//            $table->timestamp('deleted_at')->nullable();
            $table->softDeletes();
            $table->integer('created_by',false)->default(1);
            $table->integer('updated_by',false)->default(1);
            $table->integer('deleted_by',false)->default(1);
        });

        Schema::table('subscribers', function(Blueprint $table) {
            $table->foreign('bunch_id')->references('id')->on('bunches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
