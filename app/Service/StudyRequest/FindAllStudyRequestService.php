<?php

namespace App\Service\StudyRequest;

use App\Repository\StudyRequestRepository;
use App\Service\Services;

class FindAllStudyRequestService extends Services
{
    private $repository;
    public function __construct(StudyRequestRepository $repository) {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $results = $this->repository->findAll();
        return $this->resolve("OK", false, $results);
    }
}
