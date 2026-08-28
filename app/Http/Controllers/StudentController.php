<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::query()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(9);

        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create', [
            'genders' => Student::GENDERS,
            'programs' => Student::PROGRAMS,
            'yearLevels' => Student::YEAR_LEVELS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $profilePicturePath = $request->file('profile_picture')->store('student-profile-pictures', 'public');

        if ($profilePicturePath === false) {
            throw ValidationException::withMessages([
                'profile_picture' => 'The profile picture could not be saved. Please try again.',
            ]);
        }

        unset($validated['profile_picture']);

        try {
            $student = Student::create([
                ...$validated,
                'profile_picture' => $profilePicturePath,
            ]);
        } catch (Throwable $exception) {
            Storage::disk('public')->delete($profilePicturePath);

            throw $exception;
        }

        return to_route('students.show', $student)
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', ['student' => $student]);
    }
}
