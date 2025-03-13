<?php

namespace App\Service\Candidates;

use App\Repository\CandidateRepository;
use App\Service\Services;

class UpdateCandidateService extends Services
{
    private $repository;
    public function __construct(CandidateRepository $repository) {
        $this->repository = $repository;
    }

    public function update($id, $data)
    {
        $data->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Candidate not found", true);
        $model->fill($data->all());
        $candidate = $this->repository->update($model);
        return $this->resolve("Candidate updated");
    }
}
