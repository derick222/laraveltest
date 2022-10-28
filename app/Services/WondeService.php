<?php

namespace App\Services;

class WondeService
{
    /**
     * @param void
     */
    public function __construct()
    {
        $this->access_token = config('wonde.accessToken');
        $this->school_id = config('wonde.schoolId');
        $this->authentication();
    }

    /**
     * @return array
     */
    public function authentication()
    {
        // check if access token and school id is empty
        if (empty($this->access_token) || empty($this->school_id))
            return;

        $client = new \Wonde\Client($this->access_token);
        $school = $client->school($this->school_id);

        if (empty($school))
            return;

        return $school;
    }
}
