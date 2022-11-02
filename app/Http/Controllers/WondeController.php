<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassesService;
use App\Services\EmployeeService;

class WondeController extends Controller
{
    /** 
     * @var ClassesService 
     */
    private $classesService;

    /** 
     * @var EmployeeService 
     */
    private $employeeService;

    /**
     * @param void
     */
    public function __construct(
        ClassesService $classesService,
        EmployeeService $employeeService
    ) {
        $this->classesService = $classesService;
        $this->employeeService = $employeeService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $employeeIncludes = ['classes'];
        $employeeFilters = ['has_class' => true];

        return view('wonde', [
            'employees' => $this->employeeService->getEmployee($employeeIncludes, $employeeFilters)
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showStudenst(Request $request)
    {
        $className = $request->get('className');
        $classesIncludes = ['students'];
        $classesFilters = ['has_students' => true, 'class_name' => $className];

        return view('wondeStudentList', [
            'classes' => $this->classesService->getClass($classesIncludes, $classesFilters)
        ]);
    }
}
