<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('treatments')->insert([
            'treatment_name' => 'Filling',
            'price' => '1',
        ]);
        DB::table('treatments')->insert([
            'treatment_name' => 'Extraction',
            'price' => '1.5',
        ]);
        DB::table('treatments')->insert([
            'treatment_name' => 'Teeth Whitening',
            'price' => '50',
        ]);
        DB::table('treatments')->insert([
            'treatment_name' => 'Teeth Cleaning',
            'price' => '10',
        ]);
        DB::table('treatments')->insert([
            'treatment_name' => 'Braces',
            'price' => '2700',
        ]);
    }
}
