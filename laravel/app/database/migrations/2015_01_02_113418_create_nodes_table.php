<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if ( ! Schema::hasTable('nodes')) {
            Schema::create('nodes', function($table)
            {
               $table->increments('id');

                $table->unsignedInteger('workspace_id');
                $table->string('name');
                $table->text('content');
                $table->decimal('top', 10, 2);
                $table->decimal('left', 10, 2);

                $table->timestamps();

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
		Schema::dropIfExists('nodes');
	}

}
