<?php

namespace App\Http\Controllers;

use App\Service\Candidates\CreateCandidateService;
use App\Service\Candidates\DeleteCandidateService;
use App\Service\Candidates\FindAllCandidatesService;
use App\Service\Candidates\UpdateCandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    private $create_candidate_service;
    private $update_candidate_service;
    private $find_all_candidates_service;
    private $delete_candidate_service;

    public function __construct(
        CreateCandidateService $create_candidate_service,
        UpdateCandidateService $update_candidate_service,
        FindAllCandidatesService $find_all_candidates_service,
        DeleteCandidateService $delete_candidate_service
    ) {
        $this->create_candidate_service = $create_candidate_service;
        $this->update_candidate_service = $update_candidate_service;
        $this->find_all_candidates_service = $find_all_candidates_service;
        $this->delete_candidate_service = $delete_candidate_service;
    }

    public function create(Request $request)
    {
        return response()->json($this->create_candidate_service->create($request), 201);
    }

    public function update($id, Request $request)
    {
        return response()->json($this->update_candidate_service->update($id, $request), 200);
    }

    public function findAll()
    {
        return response()->json($this->find_all_candidates_service->findAll(), 200);
    }

    public function delete($id)
    {
        return response()->json($this->delete_candidate_service->delete($id), 200);
    }
}
