<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('discount')->default(0)->unsigned()->after('amount');
            $table->bigInteger('last_tire_id')->nullable()->unsigned()->after('tire_id');
            $table->foreign('last_tire_id')->references('id')->on('tires')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_last_tire_id_foreign');
            $table->dropColumn('discount');
            $table->dropColumn('last_tire_id');
        });
    }
}
