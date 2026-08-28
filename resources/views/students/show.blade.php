@extends('layouts.student', ['title' => $student->fullName()])

@section('content')
    <section class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        @if (session('success'))
            <div class="mb-8 flex items-start gap-3 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 text-emerald-200" role="status">
                <svg class="mt-0.5 size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                </svg>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('students.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 transition hover:text-white">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" />
                </svg>
                Back to students
            </a>
            <a href="{{ route('students.create') }}" class="rounded-xl bg-cyan-400 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                Register another student
            </a>
        </div>

        <article class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/80 shadow-2xl shadow-black/20">
            <div class="relative border-b border-white/10 bg-gradient-to-br from-cyan-400/15 via-slate-900 to-indigo-500/15 px-6 py-10 sm:px-10">
                <div class="flex flex-col items-center gap-6 text-center sm:flex-row sm:text-left">
                    @if ($student->profilePictureUrl())
                        <img src="{{ $student->profilePictureUrl() }}" alt="Profile picture of {{ $student->fullName() }}" class="size-32 rounded-3xl object-cover ring-4 ring-white/10 shadow-xl">
                    @else
                        <span class="flex size-32 shrink-0 items-center justify-center rounded-3xl bg-gradient-to-br from-cyan-400 to-indigo-500 text-4xl font-bold text-slate-950 shadow-xl">
                            {{ $student->initials() }}
                        </span>
                    @endif

                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-cyan-400">{{ $student->student_id }}</p>
                        <h1 class="mt-2 text-3xl font-bold text-white sm:text-4xl">{{ $student->fullName() }}</h1>
                        <p class="mt-3 text-slate-300">{{ $student->program }} &middot; {{ $student->year_level }}</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-10 px-6 py-8 sm:px-10 lg:grid-cols-2 lg:py-10">
                <section aria-labelledby="personal-heading">
                    <h2 id="personal-heading" class="text-sm font-semibold uppercase tracking-[0.16em] text-cyan-400">Personal information</h2>
                    <dl class="mt-5 grid gap-5">
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Date of birth</dt>
                            <dd class="mt-1 text-slate-200">{{ $student->date_of_birth->format('F j, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Gender</dt>
                            <dd class="mt-1 text-slate-200">{{ $student->gender }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Address</dt>
                            <dd class="mt-1 whitespace-pre-line text-slate-200">{{ $student->address }}</dd>
                        </div>
                    </dl>
                </section>

                <section aria-labelledby="contact-heading">
                    <h2 id="contact-heading" class="text-sm font-semibold uppercase tracking-[0.16em] text-cyan-400">Contact and enrollment</h2>
                    <dl class="mt-5 grid gap-5">
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Email address</dt>
                            <dd class="mt-1 break-all text-slate-200">{{ $student->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Mobile number</dt>
                            <dd class="mt-1 text-slate-200">{{ $student->mobile_number }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Program</dt>
                            <dd class="mt-1 text-slate-200">{{ $student->program }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-500">Year level</dt>
                            <dd class="mt-1 text-slate-200">{{ $student->year_level }}</dd>
                        </div>
                    </dl>
                </section>
            </div>
        </article>
    </section>
@endsection
