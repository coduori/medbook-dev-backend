<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed new patient profile
        $patient = Gender::create([
            'patient_id'   => "1",
            'gender'         => "Male"
        ]);   
    }
}
