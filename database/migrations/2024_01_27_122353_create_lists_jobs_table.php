<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('check_list_id');
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->timestamps();

            $table->foreign('check_list_id')
                ->references('id')->on('check_lists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists_jobs');
    }
}
