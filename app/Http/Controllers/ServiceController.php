<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Patient;

class ServiceController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get()->all();
        return response()::json($services,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newService = new Service;
        try{
            $newService->patient_id = $request['patient_id'];
            $newService->service_date = $request['service_date'];
            $newService->service_description = $request['service_description'];
            $newService->prescription = $request['prescription'];
            $newService->diagnosis = $request['diagnosis'];
            $newService->comments = $request['comments'];
            $newService->save();

        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        return response()::json($newService,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::where('id',$id)->get();
        if(count($service) < 1){
            return response()::json(["message"=>"Unable to find Service"],400);
        }
        return response()::json($service,200);
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
            $updateService = Service::where('id',$id)->update($request->all());
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
            $findTargetService = Service::where('id',$id)->get();
            if(count($findTargetService) < 1){
                return response()::json(["message"=>"Service NOT Found!"],200);
            }
            $targetService = Service::where('id',$id)->delete();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()::json(["message"=>$ex],400);
        }
        return response()::json(["message"=>"Service deleted successfully successful"],200);
    }
}
