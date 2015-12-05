<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('picture_id');
            $table->string('identifier')->notNull();
            $table->string('mime');
            $table->string('extension', 4);
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->timestamps();

            $table->unique(['picture_id', 'identifier']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('files');
    }
}
