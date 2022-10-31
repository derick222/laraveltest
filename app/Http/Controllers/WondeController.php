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
    public function index(Request $request)
    {

        $employeeIncludes = ['classes'];
        $employeeFilters = ['has_class' => true];

        $classesIncludes = ['students'];
        $classesFilters = ['has_students' => true];

        return view('wonde', [
            'employees' => $this->employeeService->getEmployee($employeeIncludes, $employeeFilters),
            'classes' => $this->classesService->getClass($classesIncludes, $classesFilters)
        ]);
    }
}
