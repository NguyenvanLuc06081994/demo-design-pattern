<?php


namespace App\Http\Services;


use App\Http\Repositories\ClassRepository;

class ClassService
{
    protected $classRepository;

    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAll()
    {
        return $this->classRepository->getAll();
    }

    public function findById($id)
    {
        return $this->classRepository->findById($id);
    }

    public function edit($request, $id)
    {
        $class = $this->classRepository->findById($id);
        $class->name = $request->input('name');
        $this->classRepository->save($class);
    }
}
