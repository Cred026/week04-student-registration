<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'student_id' => '2026-00001',
                'first_name' => 'Angela',
                'middle_name' => 'Reyes',
                'last_name' => 'Santos',
                'email' => 'angela.santos@example.com',
                'mobile_number' => '09171234501',
                'date_of_birth' => '2006-02-14',
                'gender' => 'Female',
                'program' => 'BS Information Technology',
                'year_level' => '1st Year',
                'address' => '12 Mabini Street, Quezon City',
            ],
            [
                'student_id' => '2026-00002',
                'first_name' => 'Marco',
                'middle_name' => 'Diaz',
                'last_name' => 'Cruz',
                'email' => 'marco.cruz@example.com',
                'mobile_number' => '09171234502',
                'date_of_birth' => '2005-07-21',
                'gender' => 'Male',
                'program' => 'BS Computer Science',
                'year_level' => '2nd Year',
                'address' => '84 Rizal Avenue, Manila',
            ],
            [
                'student_id' => '2026-00003',
                'first_name' => 'Beatriz',
                'middle_name' => null,
                'last_name' => 'Garcia',
                'email' => 'beatriz.garcia@example.com',
                'mobile_number' => '09171234503',
                'date_of_birth' => '2004-11-09',
                'gender' => 'Female',
                'program' => 'BS Information Systems',
                'year_level' => '3rd Year',
                'address' => '31 Bonifacio Road, Pasig City',
            ],
            [
                'student_id' => '2026-00004',
                'first_name' => 'Nathaniel',
                'middle_name' => 'Lim',
                'last_name' => 'Tan',
                'email' => 'nathaniel.tan@example.com',
                'mobile_number' => '09171234504',
                'date_of_birth' => '2003-05-18',
                'gender' => 'Male',
                'program' => 'BS Entertainment and Multimedia Computing',
                'year_level' => '4th Year',
                'address' => '55 Aguinaldo Street, Makati City',
            ],
            [
                'student_id' => '2026-00005',
                'first_name' => 'Sophia',
                'middle_name' => 'Mendoza',
                'last_name' => 'Flores',
                'email' => 'sophia.flores@example.com',
                'mobile_number' => '09171234505',
                'date_of_birth' => '2006-09-27',
                'gender' => 'Female',
                'program' => 'BS Information Technology',
                'year_level' => '1st Year',
                'address' => '19 Luna Street, Marikina City',
            ],
            [
                'student_id' => '2026-00006',
                'first_name' => 'Gabriel',
                'middle_name' => 'Aquino',
                'last_name' => 'Ramos',
                'email' => 'gabriel.ramos@example.com',
                'mobile_number' => '09171234506',
                'date_of_birth' => '2005-01-30',
                'gender' => 'Male',
                'program' => 'BS Computer Science',
                'year_level' => '2nd Year',
                'address' => '72 Katipunan Avenue, Quezon City',
            ],
            [
                'student_id' => '2026-00007',
                'first_name' => 'Alex',
                'middle_name' => null,
                'last_name' => 'Villanueva',
                'email' => 'alex.villanueva@example.com',
                'mobile_number' => '09171234507',
                'date_of_birth' => '2004-04-12',
                'gender' => 'Non-binary',
                'program' => 'BS Information Systems',
                'year_level' => '3rd Year',
                'address' => '28 Ortigas Extension, Cainta',
            ],
            [
                'student_id' => '2026-00008',
                'first_name' => 'Isabella',
                'middle_name' => 'Torres',
                'last_name' => 'Navarro',
                'email' => 'isabella.navarro@example.com',
                'mobile_number' => '09171234508',
                'date_of_birth' => '2003-12-03',
                'gender' => 'Female',
                'program' => 'BS Entertainment and Multimedia Computing',
                'year_level' => '4th Year',
                'address' => '46 Del Pilar Street, Mandaluyong City',
            ],
            [
                'student_id' => '2026-00009',
                'first_name' => 'Lucas',
                'middle_name' => 'Castillo',
                'last_name' => 'Rivera',
                'email' => 'lucas.rivera@example.com',
                'mobile_number' => '09171234509',
                'date_of_birth' => '2006-06-16',
                'gender' => 'Male',
                'program' => 'BS Information Technology',
                'year_level' => '1st Year',
                'address' => '63 Laurel Avenue, San Juan City',
            ],
            [
                'student_id' => '2026-00010',
                'first_name' => 'Chloe',
                'middle_name' => 'Bautista',
                'last_name' => 'Domingo',
                'email' => 'chloe.domingo@example.com',
                'mobile_number' => '09171234510',
                'date_of_birth' => '2005-10-25',
                'gender' => 'Prefer not to say',
                'program' => 'BS Computer Science',
                'year_level' => '2nd Year',
                'address' => '90 Taft Avenue, Pasay City',
            ],
        ];

        foreach ($students as $student) {
            Student::query()->updateOrCreate(
                ['student_id' => $student['student_id']],
                [
                    ...$student,
                    'profile_picture' => 'student-profile-pictures/default.jpg',
                ],
            );
        }
    }
}
