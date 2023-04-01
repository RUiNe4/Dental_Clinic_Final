<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => '',
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('admin'),
            'specialist' => '',
            'description' => '',
            'work_experience' => '',
            'acc_type' => 'admin',
        ]);

        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => 'Dr. ',
            'name' => 'Sunchhay Khoun',
            'email' => 'sunchhay@cadt.kh',
            'password' => bcrypt('1234'),
            'specialist' => 'Backend Development',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie elit a imperdiet porttitor. In non ex ex. Nam convallis, nunc quis pulvinar feugiat, dolor augue lobortis magna, quis varius velit sem et felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'work_experience' => 'Nothing',
            'acc_type' => 'Doctor',
        ]);

        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => 'Dr. ',
            'name' => 'Rethtihpong Em',
            'email' => 'rethtihpong@cadt.kh',
            'password' => bcrypt('1234'),
            'specialist' => 'Backend Development',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie elit a imperdiet porttitor. In non ex ex. Nam convallis, nunc quis pulvinar feugiat, dolor augue lobortis magna, quis varius velit sem et felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'work_experience' => 'Nothing',
            'acc_type' => 'Doctor',
        ]);

        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => 'Dr. ',
            'name' => 'Rattanakpanha Kong',
            'email' => 'rattanakpanha@cadt.kh',
            'password' => bcrypt('1234'),
            'specialist' => 'Frontend Development',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie elit a imperdiet porttitor. In non ex ex. Nam convallis, nunc quis pulvinar feugiat, dolor augue lobortis magna, quis varius velit sem et felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'work_experience' => 'Nothing',
            'acc_type' => 'Doctor',
        ]);

        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => 'Dr. ',
            'name' => 'Liza John',
            'email' => 'liza@cadt.kh',
            'password' => bcrypt('1234'),
            'specialist' => 'UX/UI Design',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie elit a imperdiet porttitor. In non ex ex. Nam convallis, nunc quis pulvinar feugiat, dolor augue lobortis magna, quis varius velit sem et felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'work_experience' => 'Nothing',
            'acc_type' => 'Doctor',
        ]);

        DB::table('users')->insert([
            'patient_count' => 2,
            'title' => 'Dr. ',
            'name' => 'Liza Chan',
            'email' => 'lizaChan@cadt.kh',
            'password' => bcrypt('1234'),
            'specialist' => 'UX/UI Design',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie elit a imperdiet porttitor. In non ex ex. Nam convallis, nunc quis pulvinar feugiat, dolor augue lobortis magna, quis varius velit sem et felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'work_experience' => 'Nothing',
            'acc_type' => 'Doctor',
        ]);
    }
}
