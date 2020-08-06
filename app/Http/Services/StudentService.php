<?php

namespace App\Http\Services;

use App\Http\Repositories\StudentRepository;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll()
    {
        return $this->studentRepository->getAll();
    }

    public function findById($id)
    {
        return $this->studentRepository->findById($id);
    }

    public function addStudent($request)
    {
        $student = new Student();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $student->image = $path;
        }
        $student->name = $request->input('name');
        $student->birthday = $request->input('date');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');
        $this->studentRepository->save($student);
    }

    public function update($request, $id)
    {
        $student = $this->studentRepository->findById($id);
        $student->name = $request->input('name');
        $student->birthday = $request->input('date');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $student->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $student->image = $path;
        }
        $this->studentRepository->save($student);
    }
}
