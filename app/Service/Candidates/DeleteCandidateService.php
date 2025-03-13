<?php

namespace App\Service\Candidates;

use App\Repository\CandidateRepository;
use App\Service\Services;

class DeleteCandidateService extends Services
{
    private $repository;
    public function __construct(CandidateRepository $repository) {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Candidate not found", true);
        $this->repository->delete($model);
        return $this->resolve("Candidate deleted");
    }
}
