<?php

namespace App\Service;

class Services
{
    public function resolve($message = "", $error = false, $data = null)
    {
        return (object) [
            'error' => $error,
            'message' => $message,
            'data' => $data
        ];
    }
}
