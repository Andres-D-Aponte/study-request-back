<?php

namespace App\Service\StudyType;

use App\Repository\StudyTypeRepository;
use App\Service\Services;

class DeleteStudyTypeService extends Services
{
    private $repository;
    public function __construct(StudyTypeRepository $repository) {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Study Type not found", true);
        $this->repository->delete($model);
        return $this->resolve("Study Type deleted");
    }
}
