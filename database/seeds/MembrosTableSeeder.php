<?php

use Illuminate\Database\Seeder;
class MembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.  php artisan db:seed --class=NOME DA CLASS
     *
     * @return void
     */
	public function run(){
		
		factory(App\Models\Admin\MembrosModel::class, 10)->create();
	}
}
