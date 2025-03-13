<?php

namespace App\Service\Candidates;

use App\Repository\CandidateRepository;
use App\Service\Services;

class FindAllCandidatesService extends Services
{
    private $repository;
    public function __construct(CandidateRepository $repository) {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $results = $this->repository->findAll();
        return $this->resolve("OK", false, $results);
    }
}
