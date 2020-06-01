<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscrepancyTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('discrepancy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('tin');
            $table->integer('office_id');
            $table->integer('asses_year');
            $table->integer('created_by');
            $table->string('comments', 1000)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_by')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('discrepancy');
    }

}
