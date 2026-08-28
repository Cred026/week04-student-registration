<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'string', 'max:50', Rule::unique(Student::class, 'student_id')],
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Student::class, 'email')],
            'mobile_number' => ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', Rule::in(Student::GENDERS)],
            'program' => ['required', Rule::in(Student::PROGRAMS)],
            'year_level' => ['required', Rule::in(Student::YEAR_LEVELS)],
            'address' => ['required', 'string', 'max:1000'],
            'profile_picture' => ['required', File::image()->types(['jpg', 'jpeg', 'png'])->max('2mb')],
        ];
    }

    /**
     * Get the validation error messages for this request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'mobile_number.regex' => 'The mobile number must contain 10 to 15 digits.',
            'date_of_birth.before' => 'The date of birth must be before today.',
            'profile_picture.required' => 'Please select a profile picture.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => Str::lower($this->string('email')->trim()->toString()),
        ]);
    }
}
