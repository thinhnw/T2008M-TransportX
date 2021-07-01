<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$ys3GxeEFgxB5ab2TAXx28.P/fro.60vK7sLNyWZ8D7Qo1QQ4Cxwwm', //12345678
            'utype' => 1
        ]);
    }
}
