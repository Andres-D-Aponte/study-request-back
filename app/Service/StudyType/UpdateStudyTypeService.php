<?php

namespace App\Service\StudyType;

use App\Repository\StudyTypeRepository;
use App\Service\Services;

class UpdateStudyTypeService extends Services
{
    private $repository;
    public function __construct(StudyTypeRepository $repository) {
        $this->repository = $repository;
    }

    public function update($id, $data)
    {
        $data->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Study Type not found", true);
        $model->fill($data->all());
        $candidate = $this->repository->update($model);
        return $this->resolve("Study Type updated");
    }
}
