<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tm = Carbon::now();
        $now =  date('d/m/'.date("Y"),strtotime($tm->toDateString()));
        $patients = Patient::all();
        $patients_etd = Patient::where('type','Etudiant')->get();
        $patients_prof = Patient::where('type','professeur')->get();
        $patients_ats = Patient::where('type','ATS')->get();



        $patientsNumber = $patients->count();
        $etdNumber = $patients_etd->count();
        $profNumber = $patients_prof->count();
        $atsNumber = $patients_ats->count();



        $appointments = DB::table('appointments')
            ->join('patients','patients.id','=','appointments.patient_id')
            ->where('date','=',$now)
            ->select('patients.id as patientID','patients.*','appointments.*')
            ->orderBy('time','ASC')
            ->get();

        $patientsWithChronic = DB::table('patients')
            ->join('diagnoses','diagnoses.patient_id','=','patients.id')
            ->select('patients.id as patientID','patients.firstName', 'patients.lastName', 'patients.birthdate', 'patients.phoneNumber','patients.pictureUrl','diagnoses.chronic')
            ->where('chronic','<>','NULL')
            ->get();



        return view('home',[
            "patientsNumber" => $patientsNumber,
            "etdNumber" => $etdNumber,
            "profNumber" => $profNumber,
            "atsNumber" => $atsNumber,
            "appointments" => $appointments,
            "patientsWithChronic" =>$patientsWithChronic,
            "patients_prof" =>$patients_prof,

        ]);



    }


}
