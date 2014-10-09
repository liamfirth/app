<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetadataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metadata', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('metadata_items_id')->unsigned();
			$table->foreign('metadata_items_id')
				->references('id')->on('metadata_items');
			$table->integer('asset_id')->unsigned();
			$table->foreign('asset_id')
				->references('id')->on('assets');
			$table->string('value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metadata');
	}

}
