<?php

namespace App\Services;

use App\Services\WondeService;
use Exception;

class EmployeeService
{
    /** 
     * @var WondeService 
     */
    protected $wondeService;

    /**
     * @param void
     */
    public function __construct(WondeService $wondeService)
    {
        $this->wondeService = $wondeService->authentication();
    }

    /**
     * @param array $includes
     * @param array $filters
     * @return array
     */
    public function getEmployee(array $includes, array $filters)
    {
        $responseData = [];
        $result = [];

        try {
            $responseData = $this->wondeService->employees->all($includes, $filters);
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
            exit;
        }

        // Get employee and classes
        foreach ($responseData as $employee) {
            $result[] = [
                'id' => $employee->id,
                'title' => $employee->title,
                'surname' => $employee->surname,
                'forename' => $employee->forename,
                'classes' => $employee->classes->data
            ];
        }

        return $result;
    }
}
