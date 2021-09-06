<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */


    public function getPatient(){

                $patients = DB::table('patients')
                ->join('diagnoses','diagnoses.patient_id','=','patients.id')
                ->select('patients.id','patients.firstName', 'patients.lastName', 'patients.birthdate', 'patients.cardNumber', 'patients.phoneNumber','patients.pictureUrl','diagnoses.diag_details','diagnoses.chronic')
                ->get();

                return $patients;

}

    public function index()
    {
        //
           $patients = DB::table('patients')
            ->join('diagnoses','diagnoses.patient_id','=','patients.id')
            ->select('patients.id','patients.firstName', 'patients.lastName', 'patients.birthdate', 'patients.cardNumber', 'patients.phoneNumber','patients.pictureUrl','diagnoses.diag_details','diagnoses.chronic')
            ->where('diagnoses.diag_details','<>','NULL')
            ->get();

       // $patients = Patient::all();


        return view('patients',[
            'patients'=>$patients,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add-patients');
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



        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'bd' => 'required',
            'gender' => 'required',
            'type' => 'required',

        ]);



        $patient = new Patient();

          if ($request->hasFile('avatar')){

                   $imgStore = $request->file('avatar');
                    $imgStore->store('storage');
                   $imgName = explode('/',$imgStore);
                  $imgUrl= end($imgName);
                 //  $imgUrl= 'url';

             Image::make($imgStore)->save(public_path('/storage/'.$imgUrl));


               }

               else{
                   $imgUrl = Null;
               }
        $treatment = Patient::updateOrCreate(

            [
                'firstName' => $request->input('fname'),
                'lastName' => $request->input('lname'),
                'birthdate' =>$request->input('bd'),
                'cardNumber' => $request->input('cardNumber'),
            ],
            [
                'firstName' => $request->input('fname'),
                'lastName' => $request->input('lname'),
                'remark' => $request->input('med_remark'),
                'birthdate' =>$request->input('bd'),
                'cardNumber' => $request->input('cardNumber'),
                'type' => $request->input('type'),
                'gender' => $request->input('gender'),
                'phoneNumber' => $request->input('tel'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'pictureUrl' => $imgUrl,
            ]
        );



       $id = DB::getPdo()->lastInsertId();

        return $this->show($id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $patientsWithDiagnosis = DB::table('patients')
            ->join('diagnoses','diagnoses.patient_id','=','patients.id')
            ->join('treatments','treatments.diagnosis_id','=','diagnoses.id')
            ->select('patients.*','diagnoses.*','treatments.medicines','treatments.remark as med_remark')
            ->where([
                ['patients.id','=',$id],
                ['diag_details','<>','NULL']
            ])
            ->get();



        $patients = DB::table('patients')
            ->select('patients.*')
            ->where('patients.id','=',$id)
            ->get();
        // $patients = Patient::all();


        if ($patientsWithDiagnosis->count()>0){
            return view('patient-profile',[
                'patients'=>$patientsWithDiagnosis,
                'diagnosis' => 1,
            ]);

        }
        elseif ($patients->count()>0){

            return view('patient-profile',[
                'patients'=>$patients,
                'diagnosis' => 0,
            ]);

        }

      // dd($patientsWithDiagnosis);
        //dd($patients);


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


        $patients = DB::table('patients')
            //->join('diagnoses','diagnoses.patient_id','=','patients.id')
            ->select('patients.*')
            ->where('patients.id','=',$id)
            ->get();

            return view('edit-patients',[

                'patients' => $patients,

            ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $patientPic = DB::table('patients')->where('id','=',$id)->select('pictureUrl')->first();

        if ($request->hasFile('avatar')){

            $imgStore = $request->file('avatar')->store('/public');
            $imgName = explode('/',$imgStore);
            $imgUrl= end($imgName);
            //  $imgUrl= 'url';

        }

        else{
            $imgUrl = $patientPic->pictureUrl;
        }
        $firstName = $request->input('fname');
        $lastName = $request->input('lname');
        $birthdate = $request->input('bd');
        $cardNumber = $request->input('cardNumber');
        $type = $request->input('type');
        $gender = $request->input('gender');
        $phoneNumber = $request->input('tel');
        $address = $request->input('address');
        $email = $request->input('email');
        $pictureUrl = $imgUrl;


        DB::table('patients')
            ->where('id', $id)
            ->update(  ['firstName' => $firstName,
                        'lastName' => $lastName,
                        'birthdate' => $birthdate,
                        'cardNumber' => $cardNumber,
                        'type' => $type,
                        'gender' => $gender,
                        'phoneNumber' => $phoneNumber,
                        'address' => $address,
                        'email' => $email,
                        'pictureUrl' => $pictureUrl

                ]);

            return $this->index();
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
        DB::table('patients')
            ->where('id', $id)
            ->delete();

        return $this->index();

    }
}
