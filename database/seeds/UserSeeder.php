<?php

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
        $users = [
            [
                "nama" => "BEM FT",
                "username" => "bemft",
                "password" => bcrypt("halonamakamusiapa"),
                "color" => "0015ff"
            ],
            [
                "nama" => "KSM IF",
                "username" => "ksmif",
                "password" => bcrypt("if1ab215p"),
                "color" => "ff0000"
            ],
        ];

        foreach ($users as $u)
        {
        	DB::table("users")->insert($u);
        }
    }
}
