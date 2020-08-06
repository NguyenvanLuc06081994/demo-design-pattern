<?php

namespace App\Http\Repositories;

use App\Student;

class StudentRepository
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function getAll()
    {
        return $this->student->all();
    }

    public function findById($id)
    {
        return $this->student->findOrFail($id);
    }

    public function save($student)
    {
        $student->save();
    }

    public function destroy($student)
    {
        $student->delete();
    }

}
