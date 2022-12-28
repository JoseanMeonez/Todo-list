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
		Schema::create('todo-list', function (Blueprint $table) {
			$table->id();
			$table->string('todo-text', 255);
			$table->integer('done');
			$table->timestamp("added_date");
			$table->date("scheduled");
			$table->integer('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('todo-list');
	}
};