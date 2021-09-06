<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use App\Patient;
use App\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,$pid)
    {
        //

        //$diagnosis = new Diagnosis();
        //$treatment = new Treatment();





        $diagnosis = Diagnosis::updateOrCreate(
            ['patient_id' => $pid],
            ['diag_details' => $request->input('diag_details'),
             'chronic' => $request->input('chronic'),
             'remark' => $request->input('diag_remark'),]
        );


        $lastID = $diagnosis->id;

      /*  $did = DB::table('diagnoses')->insertGetId([
            'patient_id' => $pid,
        ]);*/

        $treatment = Treatment::updateOrCreate(
            ['diagnosis_id' => $lastID],
            [   'medicines' => $request->input('treatment'),
                'remark' => $request->input('med_remark'),]
        );

        // DB::table('diagnoses')->where('diag_details', '=', 'NULL')->delete();


        return redirect()->route('patients');



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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
