<?php

namespace App\Service\StudyRequest;

use App\Repository\StudyRequestRepository;
use App\Service\Services;

class DeleteStudyRequestService extends Services
{
    private $repository;
    public function __construct(StudyRequestRepository $repository) {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Study Request not found", true);
        $this->repository->delete($model);
        return $this->resolve("Study Request deleted");
    }
}
