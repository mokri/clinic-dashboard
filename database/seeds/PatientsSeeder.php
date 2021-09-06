<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           $patient_fnames=['mohammed','amin','reda','karim','youcef','amel'];
           $patient_lnames=['amin','zaki','anas','loko','hmed','sara'];

       $patient_bd = ['02/10/1991','12/01/2001','12/01/2000','20/05/1971','12/01/2001','22/11/1995'];


       $users_emails = ['mohammed@gmail.com','amin@gmail.com','reda@gmail.com','karim@gmail.com','youcef@gmail.com','amel@gmail.com'];

        $type = ['etd','prof','etd','prof','prof','etd','etd'];
        $gender = ['male','female','male','male','male','male','female'];

        $phone = ['0225435458','264515456','23456465','6456123165','2215468784','265656565','546465445'];
        $spacility_ID = [1,1,2,2,3,3];

        $doc_name = 'doctor name';
        $doc_user_name = 'doc username';
        $doc_email = 'doctor@gmail.com';
        $doc_pwd = '123456789';


        array_map(function ($name, $username, $email, $pwd){

                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);


                    DB::table('users')->insert([
                        'name'=> $name,
                        'username'=>$username,
                        'email'=>$email,
                        'password'=>Hash::make($pwd),


                    ]);
                },$doc_name,$doc_user_name,$doc_email,$doc_pwd);
            }

}

/*


         DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);


*/
