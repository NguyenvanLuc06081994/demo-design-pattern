<?php
namespace App\Http\Repositories;

use App\Classes;

class ClassRepository
{
    protected $class;

    public function __construct(Classes $class)
    {
        $this->class = $class;
    }

    public function getAll()
    {
       return $this->class->all();
    }

    public function findById($id)
    {
        return $this->class->findOrFail($id);
    }

    public function save($class)
    {
        $class->save();
    }
}
