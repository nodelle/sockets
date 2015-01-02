<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkspacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('user_workspaces')) {
            Schema::create('user_workspaces', function($table)
            {
                $table->unsignedInteger('user_id');
                $table->unsignedInteger('workspace_id');

                $table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onDelete('cascade');

                $table->foreign('workspace_id')
                    ->references('id')->on('workspaces')
                    ->onDelete('cascade');
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::dropIfExists('user_workspaces');
	}

}
