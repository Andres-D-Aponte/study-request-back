<?php

namespace App\Service\StudyRequest;

use App\Models\Candidate;
use App\Models\StudyRequest;
use App\Models\StudyType;
use App\Repository\StudyRequestRepository;
use App\Service\Services;

class CreateStudyRequestService extends Services
{
    private $repository;
    private $candidate_repository;
    private $studyType_repository; 

    public function __construct(StudyRequestRepository $repository,
                                Candidate $candidate,
                                StudyType $studyType) {
        $this->repository = $repository;
        $this->candidate_repository = $candidate;
        $this->studyType_repository = $studyType;
    }

    public function create($request)
    {
        $request->validate([
            'candidato_id' => 'required|numeric|min:0',
            'tipo_estudio_id' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255|in:pendiente,en_proceso,completado',
            'fecha_solicitud' => 'nullable|date',
            'fecha_completado' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $candidate = $this->candidate_repository->find($request->candidato_id);
        if (!$candidate) return $this->resolve("Candidate not found", true);

        $studyType = $this->studyType_repository->find($request->tipo_estudio_id);
        if (!$studyType) return $this->resolve("Study Type not found", true);

        $fechaSolicitud = $request->fecha_solicitud ?? now();
        
        $model = new StudyRequest();
        $model->fill($request->all());
        $model->fecha_solicitud = $fechaSolicitud;
        $studyRequest = $this->repository->save($model);
        return $this->resolve("Study Request created");
    }
}
