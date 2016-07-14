<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call(UserTableSeeder::class);

        // Model::reguard();
		
		DB::table('users')->insert([
            'name' => 'lalala',
			'email' => 'lalala@google.com',
			// 'password' => \Crypt::encrypt('admin'),
			'password' => Hash::make('lalala'),
        ]);
    }
}
