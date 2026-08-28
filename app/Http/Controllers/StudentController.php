<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students',
            'mobile_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'program' => 'required',
            'year_level' => 'required',
            'address' => 'required|string',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        $student = Student::create($validated);

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}