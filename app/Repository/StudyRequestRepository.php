<?php

namespace App\Repository;

use App\Models\StudyRequest;

class StudyRequestRepository extends Repository
{
    function findById($id) {
        return StudyRequest::find($id);
    }

    function findAll() {
        return StudyRequest::all();
    }
}
