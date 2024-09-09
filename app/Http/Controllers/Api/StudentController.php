<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        if ($student->count() > 0) {
            return StudentResource::collection($student);
        } else {
            return response()->json(['message' => 'No Student Record Available'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|integer|unique:student,student_id',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:student,email',
            'address' => 'required',
            'gender' => 'required|string|max:6',
            'birthdate' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'message2' => 'Please check all your inputs',
                'error' => $validator->errors()
            ], 422);
        }

        $student = Student::create([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate
        ]);

        return response()->json([
            'message' => 'Student Created Successfully',
            'data' => new StudentResource($student)
        ], 200);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'address' => 'required',
            'gender' => 'required|string|max:6',
            'birthdate' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'message2' => 'Please check all your inputs',
                'error' => $validator->errors()
            ], 422);
        }

        $student->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate
        ]);

        return response()->json([
            'message' => 'Student Updated Successfully',
            'data' => new StudentResource($student)
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'Student Deleted Successfully'
        ]);
    }
}
