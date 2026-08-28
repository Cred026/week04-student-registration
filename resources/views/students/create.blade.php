@extends('layouts.student', ['title' => 'Register a Student'])

@section('content')
    @php
        $inputClasses = 'mt-2 block w-full rounded-xl border bg-slate-950/70 px-4 py-3 text-sm text-white placeholder:text-slate-600 shadow-sm outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20';
        $labelClasses = 'block text-sm font-medium text-slate-200';
    @endphp

    <section class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-cyan-400">New registration</p>
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">Create a student record</h1>
            <p class="mt-4 text-base leading-7 text-slate-400">Complete every required field. The system validates the information and securely stores the profile picture before creating the record.</p>
        </div>

        @if ($errors->any())
            <div class="mt-8 rounded-2xl border border-rose-400/20 bg-rose-400/10 p-5" role="alert">
                <div class="flex gap-3">
                    <svg class="mt-0.5 size-5 shrink-0 text-rose-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.7 2.6 17a2 2 0 0 0 1.7 3h15.4a2 2 0 0 0 1.7-3L13.7 3.7a2 2 0 0 0-3.4 0Z" />
                    </svg>
                    <div>
                        <h2 class="font-semibold text-rose-200">Please review the highlighted fields.</h2>
                        <p class="mt-1 text-sm text-rose-300/80">Your information has not been saved yet.</p>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" class="mt-8 grid gap-8">
            @csrf

            <fieldset class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-xl shadow-black/10 sm:p-8">
                <legend class="px-2 text-lg font-semibold text-white">Identity</legend>
                <p class="mb-6 text-sm text-slate-500">Names should match the student's official school records.</p>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="student_id" class="{{ $labelClasses }}">Student ID <span class="text-cyan-400">*</span></label>
                        <input id="student_id" name="student_id" type="text" value="{{ old('student_id') }}" maxlength="50" autocomplete="off" required @error('student_id') aria-invalid="true" aria-describedby="student_id-error" @enderror class="{{ $inputClasses }} @error('student_id') border-rose-400 @else border-white/10 @enderror" placeholder="e.g. 2026-00123">
                        <x-student-field-error field="student_id" />
                    </div>

                    <div>
                        <label for="first_name" class="{{ $labelClasses }}">First name <span class="text-cyan-400">*</span></label>
                        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" maxlength="100" autocomplete="given-name" required @error('first_name') aria-invalid="true" aria-describedby="first_name-error" @enderror class="{{ $inputClasses }} @error('first_name') border-rose-400 @else border-white/10 @enderror">
                        <x-student-field-error field="first_name" />
                    </div>

                    <div>
                        <label for="middle_name" class="{{ $labelClasses }}">Middle name <span class="font-normal text-slate-500">(optional)</span></label>
                        <input id="middle_name" name="middle_name" type="text" value="{{ old('middle_name') }}" maxlength="100" autocomplete="additional-name" @error('middle_name') aria-invalid="true" aria-describedby="middle_name-error" @enderror class="{{ $inputClasses }} @error('middle_name') border-rose-400 @else border-white/10 @enderror">
                        <x-student-field-error field="middle_name" />
                    </div>

                    <div>
                        <label for="last_name" class="{{ $labelClasses }}">Last name <span class="text-cyan-400">*</span></label>
                        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" maxlength="100" autocomplete="family-name" required @error('last_name') aria-invalid="true" aria-describedby="last_name-error" @enderror class="{{ $inputClasses }} @error('last_name') border-rose-400 @else border-white/10 @enderror">
                        <x-student-field-error field="last_name" />
                    </div>

                    <div>
                        <label for="date_of_birth" class="{{ $labelClasses }}">Date of birth <span class="text-cyan-400">*</span></label>
                        <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" max="{{ now()->subDay()->toDateString() }}" autocomplete="bday" required @error('date_of_birth') aria-invalid="true" aria-describedby="date_of_birth-error" @enderror class="{{ $inputClasses }} scheme-dark @error('date_of_birth') border-rose-400 @else border-white/10 @enderror">
                        <x-student-field-error field="date_of_birth" />
                    </div>

                    <div>
                        <label for="gender" class="{{ $labelClasses }}">Gender <span class="text-cyan-400">*</span></label>
                        <select id="gender" name="gender" required @error('gender') aria-invalid="true" aria-describedby="gender-error" @enderror class="{{ $inputClasses }} @error('gender') border-rose-400 @else border-white/10 @enderror">
                            <option value="">Select gender</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender }}" @selected(old('gender') === $gender)>{{ $gender }}</option>
                            @endforeach
                        </select>
                        <x-student-field-error field="gender" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-xl shadow-black/10 sm:p-8">
                <legend class="px-2 text-lg font-semibold text-white">Contact information</legend>
                <p class="mb-6 text-sm text-slate-500">Provide contact details that the school can use for official communication.</p>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label for="email" class="{{ $labelClasses }}">Email address <span class="text-cyan-400">*</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="255" autocomplete="email" autocapitalize="none" required @error('email') aria-invalid="true" aria-describedby="email-error" @enderror class="{{ $inputClasses }} @error('email') border-rose-400 @else border-white/10 @enderror" placeholder="student@example.com">
                        <x-student-field-error field="email" />
                    </div>

                    <div>
                        <label for="mobile_number" class="{{ $labelClasses }}">Mobile number <span class="text-cyan-400">*</span></label>
                        <input id="mobile_number" name="mobile_number" type="tel" value="{{ old('mobile_number') }}" maxlength="15" inputmode="numeric" pattern="[0-9]{10,15}" autocomplete="tel" required @error('mobile_number') aria-invalid="true" aria-describedby="mobile_number-error" @enderror class="{{ $inputClasses }} @error('mobile_number') border-rose-400 @else border-white/10 @enderror" placeholder="09171234567">
                        <x-student-field-error field="mobile_number" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address" class="{{ $labelClasses }}">Complete address <span class="text-cyan-400">*</span></label>
                        <textarea id="address" name="address" rows="4" maxlength="1000" autocomplete="street-address" required @error('address') aria-invalid="true" aria-describedby="address-error" @enderror class="{{ $inputClasses }} @error('address') border-rose-400 @else border-white/10 @enderror" placeholder="House number, street, barangay, city, province">{{ old('address') }}</textarea>
                        <x-student-field-error field="address" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-xl shadow-black/10 sm:p-8">
                <legend class="px-2 text-lg font-semibold text-white">Academic information</legend>
                <p class="mb-6 text-sm text-slate-500">Select the student's current program and year level.</p>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label for="program" class="{{ $labelClasses }}">Program <span class="text-cyan-400">*</span></label>
                        <select id="program" name="program" required @error('program') aria-invalid="true" aria-describedby="program-error" @enderror class="{{ $inputClasses }} @error('program') border-rose-400 @else border-white/10 @enderror">
                            <option value="">Select program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program }}" @selected(old('program') === $program)>{{ $program }}</option>
                            @endforeach
                        </select>
                        <x-student-field-error field="program" />
                    </div>

                    <div>
                        <label for="year_level" class="{{ $labelClasses }}">Year level <span class="text-cyan-400">*</span></label>
                        <select id="year_level" name="year_level" required @error('year_level') aria-invalid="true" aria-describedby="year_level-error" @enderror class="{{ $inputClasses }} @error('year_level') border-rose-400 @else border-white/10 @enderror">
                            <option value="">Select year level</option>
                            @foreach ($yearLevels as $yearLevel)
                                <option value="{{ $yearLevel }}" @selected(old('year_level') === $yearLevel)>{{ $yearLevel }}</option>
                            @endforeach
                        </select>
                        <x-student-field-error field="year_level" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-xl shadow-black/10 sm:p-8">
                <legend class="px-2 text-lg font-semibold text-white">Profile picture</legend>
                <p class="mb-6 text-sm text-slate-500">Upload a clear JPG or PNG image no larger than 2 MB.</p>

                <label for="profile_picture" class="block cursor-pointer rounded-2xl border border-dashed border-slate-600 bg-slate-950/50 p-6 text-center transition hover:border-cyan-400/60 hover:bg-cyan-400/5 @error('profile_picture') border-rose-400 @enderror">
                    <svg class="mx-auto size-9 text-cyan-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16.5V19a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-2.5M8 8l4-4 4 4M12 4v12" />
                    </svg>
                    <span class="mt-3 block text-sm font-medium text-white">Choose a profile picture</span>
                    <span class="mt-1 block text-xs text-slate-500">JPG, JPEG, or PNG &middot; Maximum 2 MB</span>
                    <input id="profile_picture" name="profile_picture" type="file" accept=".jpg,.jpeg,.png,image/jpeg,image/png" required @error('profile_picture') aria-invalid="true" aria-describedby="profile_picture-error" @enderror class="mt-4 block w-full text-sm text-slate-400 file:mr-4 file:rounded-lg file:border-0 file:bg-cyan-400 file:px-4 file:py-2 file:font-semibold file:text-slate-950 hover:file:bg-cyan-300">
                </label>
                <x-student-field-error field="profile_picture" />
            </fieldset>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">
                <a href="{{ route('students.index') }}" class="rounded-xl border border-white/10 px-5 py-3 text-center text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-cyan-400 px-6 py-3 text-sm font-bold text-slate-950 shadow-lg shadow-cyan-400/20 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Register student
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </form>
    </section>
@endsection
