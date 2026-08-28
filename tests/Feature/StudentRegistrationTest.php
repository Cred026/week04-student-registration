<?php

use App\Models\Student;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function studentRegistrationPayload(array $overrides = []): array
{
    $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=', true);

    return [
        'student_id' => '2026-00123',
        'first_name' => 'Ana',
        'middle_name' => 'Reyes',
        'last_name' => 'Santos',
        'email' => 'ANA.SANTOS@example.com',
        'mobile_number' => '09171234567',
        'date_of_birth' => '2005-04-18',
        'gender' => 'Female',
        'program' => 'BS Information Technology',
        'year_level' => '2nd Year',
        'address' => '123 Mabini Street, Manila',
        'profile_picture' => UploadedFile::fake()->createWithContent('ana-santos.png', $png),
        ...$overrides,
    ];
}

it('renders the student directory', function () {
    Student::factory()->create([
        'first_name' => 'Ana',
        'middle_name' => null,
        'last_name' => 'Santos',
    ]);

    $response = $this->get(route('students.index'));

    $response
        ->assertOk()
        ->assertViewIs('students.index')
        ->assertSee('Ana Santos');
});

it('renders the registration form', function () {
    $response = $this->get(route('students.create'));

    $response
        ->assertOk()
        ->assertViewIs('students.create')
        ->assertSee('Create a student record')
        ->assertSee('Profile picture');
});

it('registers a student and stores the profile picture', function () {
    Storage::fake('public');

    $response = $this->post(route('students.store'), [
        ...studentRegistrationPayload(),
        'created_at' => '2000-01-01 00:00:00',
    ]);

    $student = Student::query()->sole();

    $response
        ->assertRedirectToRoute('students.show', $student)
        ->assertSessionHas('success', 'Student registered successfully!');
    $this->assertDatabaseHas('students', [
        'student_id' => '2026-00123',
        'first_name' => 'Ana',
        'email' => 'ana.santos@example.com',
        'mobile_number' => '09171234567',
    ]);
    expect($student->created_at?->year)->not->toBe(2000);
    Storage::disk('public')->assertExists($student->profile_picture);
});

it('rejects a registration with missing required information', function () {
    Storage::fake('public');

    $response = $this->from(route('students.create'))->post(route('students.store'));

    $response
        ->assertRedirect(route('students.create'))
        ->assertInvalid([
            'student_id',
            'first_name',
            'last_name',
            'email',
            'mobile_number',
            'date_of_birth',
            'gender',
            'program',
            'year_level',
            'address',
            'profile_picture' => 'Please select a profile picture.',
        ]);
    expect(Student::query()->count())->toBe(0);
    Storage::disk('public')->assertDirectoryEmpty('/');
});

it('rejects invalid registration values', function () {
    Storage::fake('public');

    $response = $this->from(route('students.create'))->post(route('students.store'), studentRegistrationPayload([
        'mobile_number' => 'not-a-number',
        'date_of_birth' => now()->toDateString(),
        'gender' => 'Unknown value',
        'program' => 'Unknown program',
        'year_level' => '9th Year',
        'profile_picture' => UploadedFile::fake()->createWithContent('profile.txt', 'not an image'),
    ]));

    $response
        ->assertRedirect(route('students.create'))
        ->assertInvalid([
            'mobile_number' => 'The mobile number must contain 10 to 15 digits.',
            'date_of_birth' => 'The date of birth must be before today.',
            'gender',
            'program',
            'year_level',
            'profile_picture',
        ]);
    expect(Student::query()->count())->toBe(0);
});

it('rejects duplicate student IDs and email addresses', function () {
    Storage::fake('public');
    Student::factory()->create([
        'student_id' => '2026-00123',
        'email' => 'ana.santos@example.com',
    ]);

    $response = $this->from(route('students.create'))->post(route('students.store'), studentRegistrationPayload());

    $response
        ->assertRedirect(route('students.create'))
        ->assertInvalid(['student_id', 'email']);
    expect(Student::query()->count())->toBe(1);
});

it('escapes student supplied content on the profile page', function () {
    $dangerousAddress = '<script>alert("unsafe")</script>';
    $student = Student::factory()->create(['address' => $dangerousAddress]);

    $response = $this->get(route('students.show', $student));

    $response
        ->assertOk()
        ->assertSee($dangerousAddress)
        ->assertDontSee($dangerousAddress, escape: false);
});
