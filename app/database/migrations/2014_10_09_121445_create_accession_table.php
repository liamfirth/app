<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accession', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('assets_id')->unsigned();
		});

		Schema::table('accession', function($table)
		{
					
			$table->foreign('assets_id')->references('id')
				->on('assets');
		});

		
		DB::statement('ALTER TABLE accession AUTO_INCREMENT=100000;');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accession');
	}

}
