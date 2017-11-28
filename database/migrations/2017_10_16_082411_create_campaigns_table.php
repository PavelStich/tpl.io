<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('template_id')->unsigned();
            $table->integer('bunch_id')->unsigned();
            $table->timestamps();
//            $table->timestamp('deleted_at')->nullable();
            $table->softDeletes();
            $table->integer('created_by',false)->default(1);
            $table->integer('updated_by',false)->default(1);
            $table->integer('deleted_by',false)->default(1);
        });

        Schema::table('campaigns', function(Blueprint $table) {
            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('bunch_id')->references('id')->on('bunches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
