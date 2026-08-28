@extends('layouts.student', ['title' => 'Registered Students'])

@section('content')
    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid items-end gap-8 lg:grid-cols-[1fr_auto]">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-cyan-400">Student records</p>
                <h1 class="mt-3 text-4xl font-bold tracking-tight text-white sm:text-5xl">Registration made clear and reliable.</h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-slate-400 sm:text-lg">
                    Review registered students, verify their academic information, or add a new student through a secure validated form.
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 px-6 py-5 shadow-xl shadow-black/10">
                <p class="text-sm text-slate-400">Total registered</p>
                <p class="mt-1 text-3xl font-bold text-white">{{ number_format($students->total()) }}</p>
            </div>
        </div>

        <div class="mt-12">
            @if ($students->isEmpty())
                <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-900/60 px-6 py-16 text-center">
                    <span class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-cyan-400/10 text-cyan-400">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM19 8v6M22 11h-6" />
                        </svg>
                    </span>
                    <h2 class="mt-5 text-xl font-semibold text-white">No students registered yet</h2>
                    <p class="mx-auto mt-2 max-w-md text-slate-400">Create the first student record to begin building the registration directory.</p>
                    <a href="{{ route('students.create') }}" class="mt-6 inline-flex rounded-xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                        Register the first student
                    </a>
                </div>
            @else
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($students as $student)
                        <a href="{{ route('students.show', $student) }}" class="group rounded-2xl border border-white/10 bg-slate-900/70 p-5 shadow-lg shadow-black/10 transition hover:-translate-y-1 hover:border-cyan-400/40 hover:bg-slate-900">
                            <div class="flex items-center gap-4">
                                @if ($student->profilePictureUrl())
                                    <img src="{{ $student->profilePictureUrl() }}" alt="Profile picture of {{ $student->fullName() }}" class="size-14 rounded-2xl object-cover ring-1 ring-white/10">
                                @else
                                    <span class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-400 to-indigo-500 text-lg font-bold text-slate-950">
                                        {{ $student->initials() }}
                                    </span>
                                @endif

                                <div class="min-w-0">
                                    <h2 class="truncate font-semibold text-white group-hover:text-cyan-300">{{ $student->fullName() }}</h2>
                                    <p class="mt-1 text-sm text-slate-400">{{ $student->student_id }}</p>
                                </div>
                            </div>

                            <div class="mt-5 grid gap-3 border-t border-white/10 pt-4 text-sm">
                                <div class="flex items-start justify-between gap-4">
                                    <span class="text-slate-500">Program</span>
                                    <span class="text-right text-slate-300">{{ $student->program }}</span>
                                </div>
                                <div class="flex items-center justify-between gap-4">
                                    <span class="text-slate-500">Year level</span>
                                    <span class="rounded-full bg-cyan-400/10 px-2.5 py-1 text-xs font-medium text-cyan-300">{{ $student->year_level }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $students->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
