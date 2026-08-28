@extends('layouts.app')

@section('title', 'CCS Student Portal — All Students')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
    <div>
        <div class="inline-block bg-brand-100 text-brand-700 text-xs font-semibold px-3 py-1 rounded-full mb-3">
            College of Computer Studies
        </div>
        <h1 class="font-heading text-3xl font-bold text-slate-800">Registered Students</h1>
        <p class="text-slate-500 mt-1">{{ $students->count() }} student(s) registered so far.</p>
    </div>
    <a href="{{ route('students.create') }}"
        class="bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition shadow-md shadow-brand-600/20 whitespace-nowrap">
        + Register Student
    </a>
</div>

@if ($students->isEmpty())
    <div class="bg-white/90 backdrop-blur border border-slate-150 rounded-2xl p-12 text-center">
        <div class="text-4xl mb-3">🎓</div>
        <p class="text-slate-500 font-medium">No students registered yet.</p>
        <p class="text-slate-400 text-sm mt-1">Be the first to join the CCS Student Portal.</p>
        <a href="{{ route('students.create') }}"
            class="inline-block mt-5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition">
            Register a Student
        </a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($students as $student)
            <a href="{{ route('students.show', $student->id) }}"
                class="flex items-center gap-4 bg-white/90 backdrop-blur border border-slate-150 rounded-2xl p-4 hover:border-brand-300 hover:shadow-lg hover:shadow-brand-900/5 hover:-translate-y-0.5 transition-all">
                <img src="{{ asset('storage/' . $student->profile_picture) }}"
                    alt="{{ $student->first_name }}"
                    class="w-14 h-14 object-cover rounded-full border-2 border-brand-100">
                <div class="flex-1 min-w-0">
                    <p class="font-heading font-semibold text-slate-800 truncate">{{ $student->first_name }} {{ $student->last_name }}</p>
                    <p class="text-sm text-slate-500 truncate">{{ $student->student_id }} &middot; {{ $student->program }}</p>
                </div>
                <span class="text-brand-400 text-sm">→</span>
            </a>
        @endforeach
    </div>
@endif

@endsection