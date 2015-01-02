<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Workspace::create([
            'name' => 'Workspace 1'
        ]);

        Workspace::create([
            'name' => 'Workspace 2'
        ]);
	}

}
