<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ClassRepository;
use App\Http\Services\StudentService;
use App\Student;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    protected $studentService;
    protected $classRepository;

    public function __construct(StudentService $studentService,
                                ClassRepository $classRepository)
    {
        $this->studentService = $studentService;
        $this->classRepository = $classRepository;
    }

    public function index()
    {
        $students = $this->studentService->getAll();
        return view('students.list', compact('students'));
    }

    public function create()
    {
        $classes = $this->studentService->getAllClass();
        return view('students.create',compact('classes'));
    }

    public function store(Request $request)
    {
        $this->studentService->addStudent($request);
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

    public function edit($id)
    {
        $classes = $this->studentService->getAllClass();
        $student = $this->studentService->findById($id);
        return view('students.edit', compact('student','classes'));
    }

    public function update(Request $request, $id)
    {
        $this->studentService->update($request, $id);
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

    public function destroy($id)
    {
      $this->studentService->destroy($id);
        Session::flash('success', 'success');
        return redirect()->route('students.list');
    }

    public function filterByClass(Request $request)
    {
        $idClass = $request->class_id;
        $classFilter = $this->classRepository->findById($idClass);
        $students = Student::where('class_id',$classFilter->id)->get();
        $totalStudents = count($students);
        $classes = $this->studentService->getAllClass();
        return view('student.list',compact('students', 'classes', 'totalStudents', 'classFilter'));
    }

}
