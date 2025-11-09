<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('career')->orderBy('nombre')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $careers = Career::orderBy('nombre')->get();
        return view('students.create', compact('careers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:students,correo',
            'career_id' => 'required|exists:careers,id',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }

    public function edit(Student $student)
    {
        $careers = Career::orderBy('nombre')->get();
        return view('students.edit', compact('student', 'careers'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:students,correo,'.$student->id,
            'career_id' => 'required|exists:careers,id',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado.');
    }
}
