<?php

use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'deen',
            'email'=>'deen@gmail.com',
            'password'=>app('hash')->make('remo')


        ]);
    }
}
