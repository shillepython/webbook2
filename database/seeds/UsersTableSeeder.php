<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'        => 'Author unknown',
                'email'       => 'author_unknow@g.g',
                'password'    => bcrypt(Str::random(16)),
            ],
            [
                'name'        => 'Author',
                'email'       => 'author1@g.g',
                'password'    => bcrypt(123123),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
