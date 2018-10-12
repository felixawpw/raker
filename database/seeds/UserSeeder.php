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
                "username" => "rakerbemft",
                "password" => bcrypt("bemft2018"),
                "color" => "0015ff"
            ],
            [
                "nama" => "KMM PPM",
                "username" => "rakerkmmppm",
                "password" => bcrypt("kmmppm2968"),
                "color" => "ff0000"
            ],
            [
                "nama" => "KMM RK",
                "username" => "rakerkmmrk",
                "password" => bcrypt("kmmrk8917"),
                "color" => "cc6e83"
            ],
            [
                "nama" => "KMM Sport",
                "username" => "rakerkmmsport",
                "password" => bcrypt("kmmsport9896"),
                "color" => "6c07f9"
            ],
            [
                "nama" => "KSM IF",
                "username" => "rakerksmif",
                "password" => bcrypt("ksmif9708"),
                "color" => "16f20e"
            ],
            [
                "nama" => "KSM Elektro",
                "username" => "rakerksmelektro",
                "password" => bcrypt("ksmelektro6177"),
                "color" => "dde016"
            ],
            [
                "nama" => "KSM Fotmed",
                "username" => "rakerksmfotmed",
                "password" => bcrypt("ksmfotmed7053"),
                "color" => "d67a11"
            ],
            [
                "nama" => "KSM Tekkim",
                "username" => "rakerksmtekkim",
                "password" => bcrypt("ksmtekkim0969"),
                "color" => "24e5cf"
            ],
            [
                "nama" => "KSM TI",
                "username" => "rakerksmti",
                "password" => bcrypt("ksmti8500"),
                "color" => "#21727a"
            ],
            [
                "nama" => "KSM Manufaktur",
                "username" => "rakerksmmanuf",
                "password" => bcrypt("ksmmanuf1291"),
                "color" => "e7edc0"
            ],
        ];

        foreach ($users as $u)
        {
            DB::table("users")->insert($u);
        }
    }
}
