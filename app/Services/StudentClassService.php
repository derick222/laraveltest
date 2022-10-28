<?php

namespace App\Services;

use App\Services\WondeService;
use Exception;

class StudentClassService
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
     * @param array $params
     * @return array
     */
    public function getClass(array $params)
    {
        $responseData = [];
        $result = [];

        try {
            $responseData = $this->wondeService->classes->all($params);
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
            exit;
        }

        // Get classes
        foreach ($responseData as $class) {
            $result[] = [
                'classId' => $class->id,
                'className' => $class->name,
                'students' => $class->students->data,
                'teacher' => $class->employees->data,
                'subject' => $class->subject
            ];
        }

        return $result;
    }
}
