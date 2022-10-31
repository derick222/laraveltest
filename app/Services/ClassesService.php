<?php

namespace App\Services;

use App\Services\WondeService;
use Exception;

class ClassesService
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
    public function getClass(array $includes, array $filters)
    {
        $responseData = [];
        $result = [];

        try {
            $responseData = $this->wondeService->classes->all($includes, $filters);
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
                'students' => isset($class->students->data) ? $class->students->data : []
            ];
        }

        return $result;
    }
}
