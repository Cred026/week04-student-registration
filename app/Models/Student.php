<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $student_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile_number
 * @property Carbon $date_of_birth
 * @property string $gender
 * @property string $program
 * @property string $year_level
 * @property string $address
 * @property string|null $profile_picture
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'student_id',
    'first_name',
    'middle_name',
    'last_name',
    'email',
    'mobile_number',
    'date_of_birth',
    'gender',
    'program',
    'year_level',
    'address',
    'profile_picture',
])]
class Student extends Model
{
    /** @use HasFactory<StudentFactory> */
    use HasFactory;

    /** @var list<string> */
    public const GENDERS = [
        'Female',
        'Male',
        'Non-binary',
        'Prefer not to say',
    ];

    /** @var list<string> */
    public const PROGRAMS = [
        'BS Information Technology',
        'BS Computer Science',
        'BS Information Systems',
        'BS Entertainment and Multimedia Computing',
    ];

    /** @var list<string> */
    public const YEAR_LEVELS = [
        '1st Year',
        '2nd Year',
        '3rd Year',
        '4th Year',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    public function fullName(): string
    {
        return collect([$this->first_name, $this->middle_name, $this->last_name])
            ->filter()
            ->implode(' ');
    }

    public function initials(): string
    {
        return Str::initials($this->first_name.' '.$this->last_name, true);
    }

    public function profilePictureUrl(): ?string
    {
        return $this->profile_picture === null
            ? null
            : Storage::disk('public')->url($this->profile_picture);
    }
}
