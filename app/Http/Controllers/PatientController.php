<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Gender;

class PatientController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::get()->all();
        return response()::json($patients,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPatient = new Patient;
        //create patient on patient table
        try{
            $newPatient->name = $request['name'];
            $newPatient->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        //create patient's gender on gender table
        //get patient ID
        $findPatient = Patient::orderBy('id', 'desc')->first();
        $pateintId = $findPatient->id;
        $PateienGender = new Gender;
        try{
            $PateienGender->patient_id = $pateintId;
            $PateienGender->gender = $request['gender'];
            $newPatient->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        return response()::json($newPatient,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::where('id',$id)->get();
        if(count($patient) < 1){
            return response()::json(["message"=>"Unable to find Patient"],404);
        }
        return response()::json($patient,200);
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
        try{
            $updatePateint = Patient::where('id',$id)->update([
                "name" => $request->name
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        return response()::json(["message"=>"update successful"],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $findTargetPatient = Patient::where('id',$id)->get();
            if(count($findTargetPatient) < 1){
                return response()::json(["message"=>"pateient NOT Found!"],404);
            }
            $targetPatient = Patient::where('id',$id)->delete();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        return response()::json(["message"=>"pateient deleted successfully successful"],200);
    }
}
