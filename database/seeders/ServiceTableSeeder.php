<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Carbon\Carbon;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed new patient profile
        $service = Service::create([
            'patient_id' => "1",
            'service_date'=>Carbon::now(),
            'service_description' =>"Operation to remove toothbrush from stomach",
            'prescription'=>"Anti-histamine 2x3 daily",
            'diagnosis'=>"Patient was insane",
            'comments'=>"Pateint is a danger to himself and should not be left unattended."
        ]);   
    }
}
