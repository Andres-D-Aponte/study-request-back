<?php

namespace App\Http\Controllers;

use App\Service\StudyType\UpdateStudyTypeService;
use App\Service\StudyType\CreateStudyTypeService;
use App\Service\StudyType\DeleteStudyTypeService;
use App\Service\StudyType\FindAllStudyTypeService;
use Illuminate\Http\Request;

class StudyTypeController extends Controller
{
    private $create_study_type_service;
    private $update_study_type_service;
    private $find_all_study_types_service;
    private $delete_study_type_service;

    public function __construct(
        CreateStudyTypeService $create_study_type_service,
        UpdateStudyTypeService $update_study_type_service,
        FindAllStudyTypeService $find_all_study_types_service,
        DeleteStudyTypeService $delete_study_type_service
    ) {
        $this->create_study_type_service = $create_study_type_service;
        $this->update_study_type_service = $update_study_type_service;
        $this->find_all_study_types_service = $find_all_study_types_service;
        $this->delete_study_type_service = $delete_study_type_service;
    }

    public function create(Request $request)
    {
        return response()->json($this->create_study_type_service->create($request), 201);
    }

    public function update($id, Request $request)
    {
        return response()->json($this->update_study_type_service->update($id, $request), 200);
    }

    public function findAll()
    {
        return response()->json($this->find_all_study_types_service->findAll(), 200);
    }

    public function delete($id)
    {
        return response()->json($this->delete_study_type_service->delete($id), 200);
    }

}
