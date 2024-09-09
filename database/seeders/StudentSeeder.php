<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomID = rand(1000,9999);
        $studentID = '2019'.$randomID;
        $randomYear = rand(1950, 2005);
        $randomMonth = str_pad(rand(1,12),2,'0', STR_PAD_LEFT);
        $randomDay = str_pad(rand(1,31),2,'0', STR_PAD_LEFT);
        $genders = ['Male', 'Female'];
        $randomGender = $genders[array_rand($genders)];
        $birthdate = $randomDay.'-'.$randomMonth.'-'.$randomYear;
        DB::table('student')->insert([
            'student_id' => $studentID,
            'first_name' => Str::random(10),
            'middle_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'address' => Str::random(10),
            'gender' => $randomGender,
            'birthdate' => $birthdate,
            'created_at' => now()
        ]);
    }
}
