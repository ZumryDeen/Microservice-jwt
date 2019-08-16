<?php

use Illuminate\Database\Seeder;

class userdata2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'zumry',
            'email'=>'deen@gmail.com',
            'password'=>app('hash')->make('remo')


        ]);
    }
}
