<?php

namespace App\Service\StudyRequest;

use App\Models\Candidate;
use App\Models\StudyType;
use App\Repository\StudyRequestRepository;
use App\Service\Services;

class UpdateStudyRequestService extends Services
{
    private $repository;
    private $candidate_repository;
    private $studyType_repository;
    
    public function __construct(StudyRequestRepository $repository,
                                Candidate $candidate,
                                StudyType $studyType
    ) {
        $this->repository = $repository;
        $this->candidate_repository = $candidate;
        $this->studyType_repository = $studyType;
    }

    public function update($id, $data)
    {
        $data->validate([
            'candidato_id' => 'required|numeric|min:0',
            'tipo_estudio_id' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255|in:pendiente,en_proceso,completado',
            'fecha_solicitud' => 'nullable|date',
            'fecha_completado' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $candidate = $this->candidate_repository->find($data->candidato_id);
        if (!$candidate) return $this->resolve("Candidate not found", true);

        $studyType = $this->studyType_repository->find($data->tipo_estudio_id);
        if (!$studyType) return $this->resolve("Study Type not found", true);

        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Study Request not found", true);
        $model->fill($data->all());
        $studyRequest = $this->repository->update($model);
        return $this->resolve("Study Request updated");
    }

    public function updateStatus($id, $status)
    {   
        $status = strtolower($status);
        if (!in_array($status, ['pendiente', 'en_proceso', 'completado'])) {
            return $this->resolve("Invalid status", true);
        }
        $model = $this->repository->findById($id);
        if (!$model) return $this->resolve("Study Request not found", true);
        $model->estado = $status;
        if ($status == 'completado') {
            $model->fecha_completado = now();
        }
        $studyRequest = $this->repository->update($model);
        return $this->resolve("Study Request updated");
    }
}
