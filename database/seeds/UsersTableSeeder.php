<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\User', 5)->create(); //fillables in app/user.php worden gevuld
        DB::table('users')->insert([
            'role_id' => 1,
            'address_id' => 1,
            'is_active' => 1,
            'first_name' => 'Emile',
            'last_name' => 'Baelde',
            'nin' => '95.08.01-159.19',
            'email' => 'test@example.be',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
    }
}
