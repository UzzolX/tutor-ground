<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'id'           => '1',
                'user_id'           => '2',
                'sname'          => 'Student A',
                'address'       => 'House A Road B Block C'
            ],
        ];
        Student::truncate();
        Student::insert($students);
    }
}
