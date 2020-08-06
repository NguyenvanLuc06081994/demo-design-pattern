<?php

namespace App\Http\Controllers;

use App\Http\Services\ClassService;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function getAll()
    {
        $classes = $this->classService->getAll();
        return view('classes.list',compact('classes'));
    }

    public function showFormEdit($id)
    {
        $class = $this->classService->findById($id);
        return view('classes.edit',compact('class'));
    }

    public function edit(Request $request,$id)
    {
        $this->classService->edit($request,$id);
        return redirect()->route('classes.list');
    }
}
