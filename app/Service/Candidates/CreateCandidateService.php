<?php

namespace App\Service\Candidates;

use App\Models\Candidate;
use App\Repository\CandidateRepository;
use App\Service\Services;

class CreateCandidateService extends Services
{
    private $repository;
    public function __construct(CandidateRepository $repository) {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);
        $model = new Candidate();
        $model->fill($request->all());
        $candidate = $this->repository->save($model);
        return $this->resolve("Candidate created");
    }
}
