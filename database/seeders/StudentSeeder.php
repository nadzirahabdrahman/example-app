<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate(); //Kosongkan data dalam table
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Nadzirah', 'gender' => 'P', 'nis' => 'CA18023', 'class_id' => 1],
        //     ['name' => 'Adam', 'gender' => 'L', 'nis' => 'CB18123', 'class_id' => 1],
        //     ['name' => 'Atikah', 'gender' => 'P', 'nis' => 'CD18012', 'class_id' => 2],
        //     ['name' => 'Haziq', 'gender' => 'L', 'nis' => 'CD18011', 'class_id' => 3]
        // ];

        // foreach ($data as $value) {
                //from MODEL STUDENT
        //     Student::insert([
        //         'name' => $value['name'], 
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        //Call daripada MODEL
        Student::factory()->count(20)->create();
    }
}
