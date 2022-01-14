<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed new patient profile
        $patient = Patient::create([
            'name'         => "Claude Oduori"
        ]);   

        //Send login credentials to seeded user via e-mail
        // Mail::to(env('SEED_ADMIN_EMAIL'))->send(new SeedAdminCredentials("You have been registered as a member of Odidi Clinic. Your Membership number is: 202101001"));
    }
}
