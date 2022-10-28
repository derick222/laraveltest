<?php

namespace App\Http\Controllers;

use App\Services\StudentClassService;

class WondeController extends Controller
{
    /** 
     * @var StudentClassService 
     */
    private $studentClassService;

    /**
     * @param void
     */
    public function __construct(StudentClassService $studentClassService)
    {
        $this->studentClassService = $studentClassService;
    }

    /**
     * @return array
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $filters = ['employees', 'students'];
        return view('wonde', ['studentClass' => $this->studentClassService->getClass($filters)]);
    }
}
