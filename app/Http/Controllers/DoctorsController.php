<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doc = User::all();
        
        $doctors = Doctor::all();

        if ($doctors->count()>0){

            return view('doctors-profile',[
                'doctors'=>$doctors,
                'res' => 1,
            ]);

        }

        else{
            return view('doctors-profile',[
                'doctors'=>$doc,
                'res' =>0,
            ]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add-doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
             $doctors = new Doctor();

        
          if ($request->hasFile('avatar')){

                   $imgStore = $request->file('avatar')->store('/public');
                   $imgName = explode('/',$imgStore);
                   $imgUrl= end($imgName);
                   $doctors->pictureUrl = $imgUrl;


          }

        $doctors->firstName = $request->input('fname');
        $doctors->lastName = $request->input('lname');
        $doctors->birthdate = $request->input('bd');
        $doctors->speciality = $request->input('speciality');
        $doctors->gender = $request->input('gender');
        $doctors->phoneNumber = $request->input('tel');
        $doctors->address = $request->input('address');
        $doctors->email = $request->input('email');


        
        $doctors->save();
        
                return view('add-doctor');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $doc = DB::table('users')->where('id','=',$id)->get();

        $doctor = DB::table('doctors')->where('id','=',$id)->get();


        if ($doctor->count()>0) {
            return view('edit-doctor', [

                'doctor' => $doctor,
                'res' =>1,

            ]);

        }

        elseif ($doc->count()>0) {
            return view('edit-doctor', [

                'doctor' => $doc,
                'res' => 0,

            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name, $email)
    {
        //

        $docPic = DB::table('doctors')->where('email','=',$email)->select('pictureUrl')->first();

        if ($request->hasFile('avatar')){

            $imgStore = $request->file('avatar')->store('/public');
            $imgName = explode('/',$imgStore);
            $imgUrl= end($imgName);


        }
        else{
            $imgUrl = $docPic->pictureUrl;
        }

        $diagnosis = Doctor::updateOrCreate(
            [   'firstName' => $name,
                'email' => $email],
            [   'firstName' => $request->input('fname'),
                'lastName' => $request->input('lname'),
                'birthdate' => $request->input('bd'),
                'speciality' => $request->input('speciality'),
                'gender' => $request->input('gender'),
                'phoneNumber' => $request->input('tel'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'about' => $request->input('about'),
                'experience' => $request->input('experience'),
                'university' => $request->input('university'),
                'pictureUrl' => $imgUrl,


                ]
        );

            return redirect()->route('doctor.profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
