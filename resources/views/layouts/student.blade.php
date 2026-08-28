<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head', ['title' => $title ?? 'Student Registry'])
    </head>
    <body class="min-h-screen bg-slate-950 font-sans text-slate-100 antialiased">
        <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute -top-40 left-1/2 size-96 -translate-x-1/2 rounded-full bg-cyan-500/10 blur-3xl"></div>
            <div class="absolute right-0 top-1/3 size-80 rounded-full bg-indigo-500/10 blur-3xl"></div>
        </div>

        <header class="relative border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
            <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8" aria-label="Main navigation">
                <a href="{{ route('students.index') }}" class="flex items-center gap-3">
                    <span class="flex size-10 items-center justify-center rounded-xl bg-cyan-400 text-slate-950 shadow-lg shadow-cyan-400/20">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14 3 9l9-5 9 5-9 5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m7 12.5.3 4.2c2.9 1.8 6.5 1.8 9.4 0l.3-4.2M21 9v6" />
                        </svg>
                    </span>
                    <span>
                        <span class="block text-sm font-bold tracking-wide text-white">Student Registry</span>
                        <span class="block text-xs text-slate-400">College of Information Technology</span>
                    </span>
                </a>

                <div class="flex items-center gap-2 text-sm font-medium">
                    <a href="{{ route('students.index') }}" class="rounded-lg px-3 py-2 transition {{ request()->routeIs('students.index', 'students.show') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        Students
                    </a>
                    <a href="{{ route('students.create') }}" class="rounded-lg bg-cyan-400 px-4 py-2 text-slate-950 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-slate-950">
                        Register student
                    </a>
                </div>
            </nav>
        </header>

        <main class="relative">
            @yield('content')
        </main>

        <footer class="relative border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <p>&copy; {{ now()->year }} Student Registration System</p>
                <p>Secure validation &middot; Profile uploads &middot; SQLite development</p>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>
