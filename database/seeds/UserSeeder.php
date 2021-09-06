<?php

use Illuminate\Database\Seeder;

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
        $doc_name = 'doctor name';
        $doc_user_name = 'doc username';
        $doc_email = 'doctor@gmail.com';
        $doc_pwd = '123456789';



        DB::table('users')->insert([
            'name'=> $doc_name,
            'username'=>$doc_user_name,
            'email'=>$doc_email,
            'password'=>Hash::make($doc_pwd),

        ]);

    }
}
