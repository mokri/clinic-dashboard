<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */



    public function index()
    {
        //
        $patient_appointment = DB::table('appointments')
            ->join('patients','patients.id','=','appointments.patient_id')
            ->select('patients.*','appointments.*','appointments.id as appointmentID')
            ->get();


        return view('appointments',[

            'patientsAppointments' => $patient_appointment,
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

        $patients = Patient::all();


        return view('add-appointment',[
            'patients' => $patients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'date' => 'required',
        ]);


        $patientID = $request->input('patient_name');

        $diagnosis = Appointment::updateOrCreate(
            ['patient_id' => $patientID],
            [
                'date' =>  $request->input('date'),
                'time' => $request->input('time'),
                'aapointment_details' => $request->input('remark'),

                ]
        );




        return $this->index();

    }

    /**
     * Display the specified resource.i
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Support\Collection
     */
    public function destroy($id)
    {
        //

       DB::table('appointments')->delete($id);

       return $this->index();

    }
}
