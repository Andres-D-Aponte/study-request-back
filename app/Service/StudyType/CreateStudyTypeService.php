<?php

namespace App\Service\StudyType;

use App\Models\StudyType;
use App\Repository\StudyTypeRepository;
use App\Service\Services;

class CreateStudyTypeService extends Services
{
    private $repository;
    public function __construct(StudyTypeRepository $repository) {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);
        $model = new StudyType();
        $model->fill($request->all());
        $studytype = $this->repository->save($model);
        return $this->resolve("Study Type created");
    }
}
