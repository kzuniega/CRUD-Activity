<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Import Rule class

class StudentDB extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('student.home', ['student' => $student]);
    }

    public function create()
    {
        return view('student.create');
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|integer|unique:student,student_id',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:student,email',
            'address' => 'required',
            'gender' => 'required|string|max:6',
            'birthdate' => 'required|string'
        ]);

        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student Created Successfully');
    }

    public function updatePage(Student $student)
    {
        return view('student.update', ['student' => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email',
            'address' => 'required',
            'gender' => 'required|string|max:6',
            'birthdate' => 'required|string'
        ]);

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student Information Updated Successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student Information Deleted Successfully');
    }
}
