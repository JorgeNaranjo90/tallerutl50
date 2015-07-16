<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->mediumText('bio')->nullable();
			$table->string('twitter')->nullable();
			$table->string('website')->nullable();
			$table->date('birthdate')->nullable();
			$table->integer('user_id')->unsigned();

			/*FK
				references:: campo del cual va a tomar el id de la otra tabla
				on:: Tabla con la que realizara la relacion
				onDelete:: Tipo de borrado
			*/
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');


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
		Schema::drop('user_profiles');
	}

}
