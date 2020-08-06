<?php

namespace App\Http\Controllers;

use App\Http\Services\StudentService;
use App\Student;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAll();
        return view('students.list', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->studentService->addStudent($request);
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

    public function edit($id)
    {
        $student = $this->studentService->findById($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->studentService->update($request, $id);
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

    public function destroy($id)
    {
        $student = $this->studentService->findById($id);
        $student->delete();
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

}
