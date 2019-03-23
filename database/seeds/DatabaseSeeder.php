<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate = ['roles','addresses','users','authors','books','stocks','rentals' ];
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->toTruncate as $table){ //zorgen dat de tabel eerst wordt geleegt en dan pas gevuld met de seed
            Db::table('roles')->truncate();
            Db::table('addresses')->truncate();
            Db::table('users')->truncate();
            Db::table('authors')->truncate();
            Db::table('books')->truncate();
            Db::table('rentals')->truncate();
            Db::table('stocks')->truncate();



        }
        $this->call(RolesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        //$this->call(BooksTableSeeder::class);
        //$this->call(StockTableSeeder::class);
        //$this->call(RentalsTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


    }
}
