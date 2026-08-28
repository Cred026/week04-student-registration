<?php

use App\Models\Student;
use Database\Seeders\StudentSeeder;
use Illuminate\Support\Facades\Storage;

it('creates ten students with the default profile picture', function () {
    $this->seed(StudentSeeder::class);

    expect(Student::query()->count())->toBe(10);
    expect(Student::query()
        ->where('profile_picture', 'student-profile-pictures/default.jpg')
        ->count())->toBe(10);
    expect(Storage::disk('public')->exists('student-profile-pictures/default.jpg'))->toBeTrue();
});

it('does not duplicate the demonstration students when rerun', function () {
    $this->seed(StudentSeeder::class);
    $this->seed(StudentSeeder::class);

    expect(Student::query()->count())->toBe(10);
});
