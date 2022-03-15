<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('event_date');
            $table->string('post_no');
            $table->string('total_rows');
            $table->unsignedBigInteger('postedBy_id')->unsigned();
            $table->foreign('postedBy_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};
