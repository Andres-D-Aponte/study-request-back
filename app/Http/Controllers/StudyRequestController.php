<?php

namespace App\Http\Controllers;

use App\Service\StudyRequest\UpdateStudyRequestService;
use App\Service\StudyRequest\CreateStudyRequestService;
use App\Service\StudyRequest\DeleteStudyRequestService;
use App\Service\StudyRequest\FindAllStudyRequestService;
use Illuminate\Http\Request;

class StudyRequestController extends Controller
{
    private $create_study_Request_service;
    private $update_study_Request_service;
    private $find_all_study_Requests_service;
    private $delete_study_Request_service;

    public function __construct(
        CreateStudyRequestService $create_study_Request_service,
        UpdateStudyRequestService $update_study_Request_service,
        FindAllStudyRequestService $find_all_study_Requests_service,
        DeleteStudyRequestService $delete_study_Request_service
    ) {
        $this->create_study_Request_service = $create_study_Request_service;
        $this->update_study_Request_service = $update_study_Request_service;
        $this->find_all_study_Requests_service = $find_all_study_Requests_service;
        $this->delete_study_Request_service = $delete_study_Request_service;
    }

    public function create(Request $request)
    {
        return response()->json($this->create_study_Request_service->create($request), 201);
    }

    public function update($id, Request $request)
    {
        return response()->json($this->update_study_Request_service->update($id, $request), 200);
    }

    public function updateStatus($id, $status)
    {
        return response()->json($this->update_study_Request_service->updateStatus($id, $status), 200);
    }

    public function findAll()
    {
        return response()->json($this->find_all_study_Requests_service->findAll(), 200);
    }

    public function delete($id)
    {
        return response()->json($this->delete_study_Request_service->delete($id), 200);
    }

}
