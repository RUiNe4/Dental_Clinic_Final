<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('services')->insert([
				'service_name' => 'Orthodontic',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Dental Implant',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Treatment',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Oral Hygiene',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Dentures',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Cosmetic Dentistry',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Periodontology',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
	
			DB::table('services')->insert([
				'service_name' => 'Dental Surgery',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]);
    }
}
