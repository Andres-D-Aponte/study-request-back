<?php

namespace App\Service\StudyType;

use App\Repository\StudyTypeRepository;
use App\Service\Services;

class FindAllStudyTypeService extends Services
{
    private $repository;
    public function __construct(StudyTypeRepository $repository) {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $results = $this->repository->findAll();
        return $this->resolve("OK", false, $results);
    }
}
