<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('accepted_by')->unsigned()->nullable();
            $table->foreign('accepted_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('history')->default(null);
            $table->text('reason')->default(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamp('accepted_time')->default(null)->nullable();
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
        Schema::dropIfExists('back_histories');
    }
}
