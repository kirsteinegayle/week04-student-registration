@extends('layouts.app')

@section('title', 'CCS Student Portal — Profile')

@section('content')

@if (session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2 max-w-2xl mx-auto">
        <span class="text-emerald-500">✓</span> {{ session('success') }}
    </div>
@endif

<div class="max-w-2xl mx-auto">
    <div class="bg-gradient-to-br from-brand-600 to-brand-800 rounded-t-2xl p-8 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_1px_1px,white_1px,transparent_0)] bg-[length:16px_16px]"></div>
        <img src="{{ asset('storage/' . $student->profile_picture) }}"
            alt="{{ $student->first_name }}'s profile picture"
            class="w-32 h-32 object-cover rounded-full border-4 border-white/30 mx-auto relative">
        <h1 class="font-heading text-2xl font-semibold mt-4 relative">
            {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
        </h1>
        <p class="text-brand-100 text-sm mt-1 relative">{{ $student->program }} &middot; {{ $student->year_level }}</p>
        <span class="inline-block mt-3 bg-white/15 text-white text-xs font-medium px-3 py-1 rounded-full relative">
            ID: {{ $student->student_id }}
        </span>
    </div>

    <div class="bg-white shadow-lg shadow-brand-900/5 border border-slate-150 border-t-0 rounded-b-2xl p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 text-sm">
            <div class="flex items-start gap-3">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">📧</span>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-0.5">Email</p>
                    <p class="text-slate-700">{{ $student->email }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">📱</span>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-0.5">Mobile Number</p>
                    <p class="text-slate-700">{{ $student->mobile_number }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">🎂</span>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-0.5">Date of Birth</p>
                    <p class="text-slate-700">{{ $student->date_of_birth }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">⚧</span>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-0.5">Gender</p>
                    <p class="text-slate-700">{{ $student->gender }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3 md:col-span-2">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0">🏠</span>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-0.5">Address</p>
                    <p class="text-slate-700">{{ $student->address }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-between items-center">
            <a href="{{ route('students.index') }}"
                class="inline-flex items-center gap-1 text-brand-600 hover:text-brand-700 font-medium text-sm">
                &larr; View all students
            </a>
            <a href="{{ route('students.create') }}"
                class="text-slate-400 hover:text-brand-600 text-sm transition">
                + Register another
            </a>
        </div>
    </div>
</div>

@endsection